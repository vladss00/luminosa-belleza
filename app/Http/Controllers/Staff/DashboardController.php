<?php
// app/Http/Controllers/Staff/DashboardController.php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Staff;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display staff dashboard.
     */
    public function index()
    {
        $staff = Staff::where('user_id', auth()->id())->firstOrFail();
        
        // Today's appointments
        $todayAppointments = Appointment::where('staff_id', $staff->id)
            ->whereDate('appointment_date', today())
            ->with(['customer', 'service'])
            ->orderBy('appointment_date')
            ->get();

        // Upcoming appointments (next 7 days)
        $upcomingAppointments = Appointment::where('staff_id', $staff->id)
            ->where('appointment_date', '>', now())
            ->where('appointment_date', '<=', now()->addDays(7))
            ->whereIn('status', ['pending', 'confirmed'])
            ->with(['customer', 'service'])
            ->orderBy('appointment_date')
            ->get();

        // Statistics
        $stats = [
            'today_total' => $todayAppointments->count(),
            'today_completed' => $todayAppointments->where('status', 'completed')->count(),
            'today_pending' => $todayAppointments->whereIn('status', ['pending', 'confirmed'])->count(),
            'upcoming_total' => $upcomingAppointments->count(),
        ];

        return view('staff.dashboard', compact('todayAppointments', 'upcomingAppointments', 'staff', 'stats'));
    }

public function toggleAvailability()
    {
        // Find the staff record associated with the logged-in user
        $staff = Staff::where('user_id', auth()->id())->firstOrFail();
        
        // Toggle the status
        $staff->is_available = !$staff->is_available;
        $staff->save();

        return back()->with('success', 'Status updated successfully!');
    }

    /**
     * Display all appointments for staff.
     */
    public function appointments(Request $request)
    {
        $staff = Staff::where('user_id', auth()->id())->firstOrFail();
        
        $query = Appointment::where('staff_id', $staff->id)
            ->with(['customer', 'service']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by date
        if ($request->filled('date')) {
            $query->whereDate('appointment_date', $request->date);
        }

        // Filter by date range
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('appointment_date', [
                $request->start_date,
                $request->end_date
            ]);
        }

        $appointments = $query->orderBy('appointment_date', 'desc')
            ->paginate(15);

        return view('staff.appointments', compact('appointments'));
    }

    /**
     * Update appointment status.
     */
    public function updateStatus(Request $request, Appointment $appointment)
    {
        $staff = Staff::where('user_id', auth()->id())->firstOrFail();
        
        // Verify appointment belongs to this staff member
        if ($appointment->staff_id !== $staff->id) {
            abort(403, 'Unauthorized access.');
        }

        $validated = $request->validate([
            'status' => 'required|in:confirmed,in_progress,completed,cancelled'
        ]);

        $appointment->update(['status' => $validated['status']]);

        return redirect()
            ->back()
            ->with('success', 'Appointment status updated successfully.');
    }

    /**
     * Display appointment details.
     */
    public function showAppointment(Appointment $appointment)
    {
        $staff = Staff::where('user_id', auth()->id())->firstOrFail();
        
        // Verify appointment belongs to this staff member
        if ($appointment->staff_id !== $staff->id) {
            abort(403, 'Unauthorized access.');
        }

        $appointment->load(['customer', 'service']);
        
        return view('staff.appointment-details', compact('appointment'));
    }

    /**
     * Display and manage staff availability.
     */
    public function availability()
    {
        $staff = Staff::where('user_id', auth()->id())
            ->with('availability')
            ->firstOrFail();

        $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        return view('staff.availability', compact('staff', 'daysOfWeek'));
    }

    
    /**
     * Update staff availability.
     */
  public function updateAvailability(Request $request)
{
    $staff = Staff::where('user_id', auth()->id())->firstOrFail();

    // 1. Define the rules
    $rules = [
        'availability' => 'required|array',
        'availability.*.day_of_week' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
        'availability.*.is_available' => 'sometimes', 
        'availability.*.start_time' => 'required_if:availability.*.is_available,1|date_format:H:i|nullable',
        'availability.*.end_time' => 'required_if:availability.*.is_available,1|date_format:H:i|after:availability.*.start_time|nullable',
    ];

    // 2. Map technical keys to friendly names (Attributes)
    $customAttributes = [];
    foreach ($request->input('availability', []) as $index => $data) {
        $dayName = ucfirst($data['day_of_week'] ?? 'Day');
        $customAttributes["availability.{$index}.start_time"] = "{$dayName} start time";
        $customAttributes["availability.{$index}.end_time"]   = "{$dayName} end time";
        $customAttributes["availability.{$index}.is_available"] = "{$dayName} availability";
    }

    // 3. Define custom message templates
    $customMessages = [
        'availability.*.end_time.after' => 'The :attribute must be later than the start time.',
        'availability.*.start_time.required_if' => 'The :attribute is required when the day is marked as available.',
    ];

    // 4. Run validation with all three components
    $request->validate($rules, $customMessages, $customAttributes);

    // Save Logic
    $staff->availability()->delete();

    foreach ($request->availability as $data) {
        if (isset($data['is_available']) && $data['is_available'] == "1") {
            $staff->availability()->create([
                'day_of_week' => $data['day_of_week'],
                'start_time'  => $data['start_time'],
                'end_time'    => $data['end_time'],
            ]);
        }
    }

    return redirect()->back()->with('success', 'Availability updated successfully.');
}
}