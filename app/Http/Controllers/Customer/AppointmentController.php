<?php
// app/Http/Controllers/Customer/AppointmentController.php
// IMPROVED VERSION with better staff filtering

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    /**
     * Display a listing of customer's appointments.
     */
    public function index()
    {
        $appointments = Appointment::with(['services', 'staff.user', 'service'])
            ->where('customer_id', auth()->id())
            ->orderBy('appointment_date', 'desc')
            ->paginate(10);

        return view('customer.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new appointment.
     */
    public function create()
    {
        $services = Service::active()->get()->groupBy('category');
        return view('customer.appointments.create', compact('services'));
    }

    /**
     * Get available staff for multiple services (API endpoint).
     * IMPROVED: Better filtering logic for multi-service selection
     */
    public function getAvailableStaff(Request $request)
    {
        // Get service IDs from request (can be single or array)
        $serviceIds = $request->input('service_ids');
        
        // Handle both array and comma-separated string
        if (is_string($serviceIds)) {
            $serviceIds = array_filter(explode(',', $serviceIds));
        }
        
        if (empty($serviceIds)) {
            return response()->json([]);
        }

        // Convert to integers
        $serviceIds = array_map('intval', $serviceIds);
        $serviceCount = count($serviceIds);

        Log::info('Looking for staff who can handle services', [
            'service_ids' => $serviceIds,
            'service_count' => $serviceCount
        ]);

        // Find staff who can perform ALL selected services
        // Using subquery to count how many of the selected services each staff can do
        $staff = Staff::whereHas('services', function($query) use ($serviceIds) {
                $query->whereIn('service_id', $serviceIds);
            })
            ->with('user')
            ->available()
            ->get()
            ->filter(function($staffMember) use ($serviceIds, $serviceCount) {
                // Count how many of the selected services this staff can do
                $staffServiceIds = $staffMember->services->pluck('id')->toArray();
                $matchCount = count(array_intersect($staffServiceIds, $serviceIds));
                
                // Only include staff who can do ALL selected services
                return $matchCount === $serviceCount;
            })
            ->map(function($s) use ($serviceIds) {
                // Get the service names this staff can handle
                $serviceNames = $s->services()
                    ->whereIn('service_id', $serviceIds)
                    ->pluck('name')
                    ->toArray();
                
                return [
                    'id' => $s->id,
                    'name' => $s->user->name,
                    'specialization' => $s->specialization,
                    'profile_image' => $s->profile_image_url ?? null,
                    'can_handle_services' => $serviceNames, // For debugging
                ];
            })
            ->values(); // Reset array keys

        Log::info('Staff search results', [
            'found_staff_count' => $staff->count(),
            'staff' => $staff->toArray()
        ]);

        return response()->json($staff);
    }

    /**
     * Get available time slots for multiple services (API endpoint).
     */
    public function getAvailableSlots(Request $request)
    {
        $staffId = $request->staff_id;
        $date = Carbon::parse($request->date);
        
        // Get service IDs (can be comma-separated or array)
        $serviceIds = $request->input('service_ids');
        
        if (is_string($serviceIds)) {
            $serviceIds = array_filter(explode(',', $serviceIds));
        }

        if (empty($serviceIds)) {
            return response()->json(['slots' => [], 'message' => 'No services selected']);
        }

        // Calculate total duration for all services
        $services = Service::whereIn('id', $serviceIds)->get();
        $totalDuration = $services->sum('duration');

        if ($totalDuration == 0) {
            return response()->json(['slots' => [], 'message' => 'Invalid services']);
        }

        // Get staff availability for the day
        $dayOfWeek = strtolower($date->format('l'));
        $availability = DB::table('staff_availability')
            ->where('staff_id', $staffId)
            ->where('day_of_week', $dayOfWeek)
            ->where('is_available', true)
            ->first();

        if (!$availability) {
            return response()->json(['slots' => [], 'message' => 'Staff is not available on this day']);
        }

        // Get existing appointments for the day
        $existingAppointments = Appointment::where('staff_id', $staffId)
            ->whereDate('appointment_date', $date)
            ->whereNotIn('status', ['cancelled'])
            ->get();

        // Generate time slots
        $slots = [];
        $currentTime = Carbon::parse($date->format('Y-m-d') . ' ' . $availability->start_time);
        $endTime = Carbon::parse($date->format('Y-m-d') . ' ' . $availability->end_time);

        while ($currentTime->copy()->addMinutes($totalDuration) <= $endTime) {
            $slotStart = $currentTime->copy();
            $slotEnd = $currentTime->copy()->addMinutes($totalDuration);

            // Check if slot is available
            $isAvailable = true;
            foreach ($existingAppointments as $appointment) {
                $appointmentStart = Carbon::parse($appointment->appointment_date);
                $appointmentEnd = Carbon::parse($appointment->end_time);

                // Check for overlap
                if (
                    ($slotStart >= $appointmentStart && $slotStart < $appointmentEnd) ||
                    ($slotEnd > $appointmentStart && $slotEnd <= $appointmentEnd) ||
                    ($slotStart <= $appointmentStart && $slotEnd >= $appointmentEnd)
                ) {
                    $isAvailable = false;
                    break;
                }
            }

            // Only add slots that are in the future
            if ($isAvailable && $slotStart >= now()) {
                $slots[] = [
                    'time' => $slotStart->format('H:i'),
                    'display' => $slotStart->format('h:i A'),
                    'end_time' => $slotEnd->format('h:i A') // Show end time for transparency
                ];
            }

            $currentTime->addMinutes(30); // Move to next slot (30-minute intervals)
        }

        return response()->json([
            'slots' => $slots,
            'total_duration' => $totalDuration,
            'formatted_duration' => $this->formatDuration($totalDuration),
            'service_count' => count($serviceIds)
        ]);
    }

    /**
     * Store a newly created appointment with multiple services.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_ids' => 'required|array|min:1|max:5',
            'service_ids.*' => 'required|exists:services,id|distinct',
            'staff_id' => 'required|exists:staff,id',
            'appointment_date' => 'required|date|after:now',
            'time_slot' => 'required',
            'notes' => 'nullable|string|max:500'
        ]);

        // Verify staff can handle all selected services
        $staff = Staff::findOrFail($validated['staff_id']);
        $staffServiceIds = $staff->services->pluck('id')->toArray();
        $requestedServiceIds = $validated['service_ids'];
        
        $canHandleAll = count(array_diff($requestedServiceIds, $staffServiceIds)) === 0;
        
        if (!$canHandleAll) {
            return back()
                ->withErrors(['staff_id' => 'The selected staff cannot perform all the selected services.'])
                ->withInput();
        }

        // Get all selected services
        $services = Service::whereIn('id', $validated['service_ids'])->get();
        
        // Calculate totals
        $totalDuration = $services->sum('duration');
        $totalPrice = $services->sum('price');

        $appointmentDateTime = Carbon::parse($validated['appointment_date'] . ' ' . $validated['time_slot']);
        $endTime = $appointmentDateTime->copy()->addMinutes($totalDuration);

        // Double-check for conflicts
        $conflict = Appointment::where('staff_id', $validated['staff_id'])
            ->where(function($query) use ($appointmentDateTime, $endTime) {
                $query->whereBetween('appointment_date', [$appointmentDateTime, $endTime])
                      ->orWhereBetween('end_time', [$appointmentDateTime, $endTime])
                      ->orWhere(function($q) use ($appointmentDateTime, $endTime) {
                          $q->where('appointment_date', '<=', $appointmentDateTime)
                            ->where('end_time', '>=', $endTime);
                      });
            })
            ->whereNotIn('status', ['cancelled'])
            ->exists();

        if ($conflict) {
            return back()
                ->withErrors(['time_slot' => 'This time slot is no longer available. Please select another time.'])
                ->withInput();
        }

        DB::beginTransaction();
        try {
            // Create appointment
            $appointment = Appointment::create([
                'customer_id' => auth()->id(),
                'staff_id' => $validated['staff_id'],
                'service_id' => $validated['service_ids'][0], // First service for backward compatibility
                'appointment_date' => $appointmentDateTime,
                'end_time' => $endTime,
                'total_duration' => $totalDuration,
                'total_price' => $totalPrice,
                'status' => 'pending',
                'notes' => $validated['notes'] ?? null
            ]);

            // Attach all services with their order
            $serviceData = [];
            foreach ($validated['service_ids'] as $index => $serviceId) {
                $serviceData[$serviceId] = ['order' => $index + 1];
            }
            $appointment->services()->attach($serviceData);

            DB::commit();

            $serviceNames = $services->pluck('name')->join(', ');
            ActivityLog::log('created', 'appointment',
                "Customer '" . auth()->user()->name . "' booked appointment #{$appointment->id} for {$serviceNames} on {$appointmentDateTime->format('M d, Y h:i A')}.",
                $appointment,
                ['services' => $serviceNames, 'total_price' => $totalPrice, 'total_duration' => $totalDuration]
            );

            Log::info('Appointment created successfully', [
                'appointment_id' => $appointment->id,
                'customer_id' => auth()->id(),
                'staff_id' => $validated['staff_id'],
                'services' => $validated['service_ids'],
                'total_price' => $totalPrice,
                'total_duration' => $totalDuration
            ]);

            return redirect()
                ->route('customer.appointments.show', $appointment)
                ->with('success', 'Appointment booked successfully! We will confirm your appointment soon.');

        } catch (\Exception $e) {
            DB::rollBack();
            
            Log::error('Failed to create appointment', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()
                ->withErrors(['error' => 'Failed to create appointment. Please try again.'])
                ->withInput();
        }
    }

    /**
     * Display the specified appointment.
     */
    public function show(Appointment $appointment)
    {
        // Check if the appointment belongs to the authenticated customer
        if ($appointment->customer_id !== auth()->id()) {
            abort(403, 'Unauthorized access to this appointment.');
        }
        
        $appointment->load(['services', 'staff.user']);
        return view('customer.appointments.show', compact('appointment'));
    }

    /**
     * Cancel the specified appointment.
     */
    public function cancel(Appointment $appointment)
    {
        // Check if the appointment belongs to the authenticated customer
        if ($appointment->customer_id !== auth()->id()) {
            abort(403, 'Unauthorized access to this appointment.');
        }

        if (!$appointment->canBeCancelled()) {
            return back()->withErrors(['error' => 'This appointment cannot be cancelled.']);
        }

        $appointment->update(['status' => 'cancelled']);

        ActivityLog::log('status_changed', 'appointment',
            "Customer '" . auth()->user()->name . "' cancelled appointment #{$appointment->id}.",
            $appointment,
            ['old_status' => 'pending/confirmed', 'new_status' => 'cancelled']
        );

        return redirect()
            ->route('customer.appointments.index')
            ->with('success', 'Appointment cancelled successfully.');
    }

    /**
     * Helper function to format duration.
     */
    private function formatDuration($minutes)
    {
        $hours = floor($minutes / 60);
        $mins = $minutes % 60;
        
        if ($hours > 0 && $mins > 0) {
            return "{$hours}h {$mins}m";
        } elseif ($hours > 0) {
            return "{$hours}h";
        } else {
            return "{$mins}m";
        }
    }
}