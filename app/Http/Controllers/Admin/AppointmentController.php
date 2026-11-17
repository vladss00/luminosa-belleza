<?php
// app/Http/Controllers/Admin/AppointmentController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    /**
     * Display a listing of appointments.
     */
    public function index(Request $request)
    {
        $query = Appointment::with(['customer', 'staff.user', 'service']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by date
        if ($request->filled('date')) {
            $query->whereDate('appointment_date', $request->date);
        }

        // Filter by staff
        if ($request->filled('staff_id')) {
            $query->where('staff_id', $request->staff_id);
        }

        // Filter by service
        if ($request->filled('service_id')) {
            $query->where('service_id', $request->service_id);
        }

        // Search by customer name
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('customer', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $appointments = $query->orderBy('appointment_date', 'desc')
            ->paginate(20);

        // Get filter options
        $staff = Staff::with('user')->get();
        $services = Service::active()->get();

        return view('admin.appointments.index', compact('appointments', 'staff', 'services'));
    }

    /**
     * Show the form for creating a new appointment.
     */
    public function create()
    {
        $customers = User::where('role', 'customer')->orderBy('name')->get();
        $services = Service::active()->get();
        $staff = Staff::with('user')->available()->get();

        return view('admin.appointments.create', compact('customers', 'services', 'staff'));
    }

    /**
     * Store a newly created appointment.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'staff_id' => 'required|exists:staff,id',
            'appointment_date' => 'required|date|after:now',
            'time_slot' => 'required',
            'status' => 'required|in:pending,confirmed',
            'notes' => 'nullable|string|max:500'
        ]);

        $service = Service::findOrFail($validated['service_id']);
        $appointmentDateTime = Carbon::parse($validated['appointment_date'] . ' ' . $validated['time_slot']);
        $endTime = $appointmentDateTime->copy()->addMinutes($service->duration);

        // Check for conflicts
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
                ->withErrors(['time_slot' => 'This time slot conflicts with an existing appointment.'])
                ->withInput();
        }

        $appointment = Appointment::create([
            'customer_id' => $validated['customer_id'],
            'staff_id' => $validated['staff_id'],
            'service_id' => $validated['service_id'],
            'appointment_date' => $appointmentDateTime,
            'end_time' => $endTime,
            'status' => $validated['status'],
            'notes' => $validated['notes'] ?? null
        ]);

        $customer = User::find($validated['customer_id']);
        ActivityLog::log('created', 'appointment',
            "Created appointment #{$appointment->id} for customer '{$customer->name}' on {$appointmentDateTime->format('M d, Y H:i')}.",
            $appointment,
            ['status' => $validated['status'], 'service_id' => $validated['service_id']]
        );

        return redirect()
            ->route('admin.appointments.index')
            ->with('success', 'Appointment created successfully.');
    }

    /**
     * Display the specified appointment.
     */
    public function show(Appointment $appointment)
    {
        $appointment->load(['customer', 'staff.user', 'service']);
        
        return view('admin.appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified appointment.
     */
    public function edit(Appointment $appointment)
    {
        $appointment->load(['customer', 'staff.user', 'service']);
        $customers = User::where('role', 'customer')->orderBy('name')->get();
        $services = Service::active()->get();
        $staff = Staff::with('user')->available()->get();

        return view('admin.appointments.edit', compact('appointment', 'customers', 'services', 'staff'));
    }

    /**
     * Update the specified appointment.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'staff_id' => 'required|exists:staff,id',
            'appointment_date' => 'required|date',
            'time_slot' => 'required',
            'status' => 'required|in:pending,confirmed,in_progress,completed,cancelled',
            'notes' => 'nullable|string|max:500'
        ]);

        $service = Service::findOrFail($validated['service_id']);
        $appointmentDateTime = Carbon::parse($validated['appointment_date'] . ' ' . $validated['time_slot']);
        $endTime = $appointmentDateTime->copy()->addMinutes($service->duration);

        // Check for conflicts (excluding current appointment)
        $conflict = Appointment::where('staff_id', $validated['staff_id'])
            ->where('id', '!=', $appointment->id)
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
                ->withErrors(['time_slot' => 'This time slot conflicts with an existing appointment.'])
                ->withInput();
        }

        $oldStatus = $appointment->status;

        $appointment->update([
            'customer_id' => $validated['customer_id'],
            'staff_id' => $validated['staff_id'],
            'service_id' => $validated['service_id'],
            'appointment_date' => $appointmentDateTime,
            'end_time' => $endTime,
            'status' => $validated['status'],
            'notes' => $validated['notes'] ?? null
        ]);

        ActivityLog::log('updated', 'appointment',
            "Updated appointment #{$appointment->id} (status: {$oldStatus} → {$validated['status']}).",
            $appointment,
            ['old_status' => $oldStatus, 'new_status' => $validated['status']]
        );

        return redirect()
            ->route('admin.appointments.index')
            ->with('success', 'Appointment updated successfully.');
    }

    /**
     * Remove the specified appointment.
     */
    public function destroy(Appointment $appointment)
    {
        $id = $appointment->id;
        $appointment->delete();

        ActivityLog::log('deleted', 'appointment',
            "Deleted appointment #{$id}.",
            null
        );

        return redirect()
            ->route('admin.appointments.index')
            ->with('success', 'Appointment deleted successfully.');
    }

    public function updateStatus(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,in_progress,completed,cancelled'
        ]);

        $oldStatus = $appointment->status;
        $appointment->update(['status' => $validated['status']]);

        ActivityLog::log('status_changed', 'appointment',
            "Appointment #{$appointment->id} status changed from '{$oldStatus}' to '{$validated['status']}'.",
            $appointment,
            ['old' => $oldStatus, 'new' => $validated['status']]
        );

        return redirect()
            ->back()
            ->with('success', 'Appointment status updated successfully.');
    }
}