<?php
// app/Http/Controllers/Admin/StaffController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Staff;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    /**
     * Display a listing of staff members.
     */
    public function index()
    {
        $staff = Staff::with(['user', 'services'])
            ->withCount('appointments')
            ->paginate(15);

        return view('admin.staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new staff member.
     */
    public function create()
    {
        $services = Service::active()->get();
        return view('admin.staff.create', compact('services'));
    }

    /**
     * Store a newly created staff member.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'specialization' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'services' => 'required|array|min:1',
            'services.*' => 'exists:services,id',
            'is_available' => 'boolean'
        ]);

        // Create user account
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'] ?? null,
            'role' => 'staff'
        ]);

        // Handle profile image upload
        $profileImagePath = null;
        if ($request->hasFile('profile_image')) {
            $profileImagePath = $request->file('profile_image')->store('staff-profiles', 'public');
        }

        // Create staff profile
        $staff = Staff::create([
            'user_id' => $user->id,
            'specialization' => $validated['specialization'] ?? null,
            'bio' => $validated['bio'] ?? null,
            'profile_image' => $profileImagePath,
            'is_available' => $request->has('is_available') ? true : false
        ]);

        // Attach services
        $staff->services()->attach($validated['services']);

        ActivityLog::log('created', 'staff',
            "Added new staff member '{$user->name}' ({$user->email}).",
            $staff
        );

        return redirect()
            ->route('admin.staff.index')
            ->with('success', 'Staff member created successfully.');
    }

    /**
     * Display the specified staff member.
     */
    public function show(Staff $staff)
    {
        $staff->load(['user', 'services', 'availability', 'appointments' => function($query) {
            $query->with(['customer', 'service'])
                  ->latest()
                  ->limit(10);
        }]);

        $stats = [
            'total_appointments' => $staff->appointments()->count(),
            'completed_appointments' => $staff->appointments()->where('status', 'completed')->count(),
            'pending_appointments' => $staff->appointments()->where('status', 'pending')->count(),
            'this_month_appointments' => $staff->appointments()
                ->whereMonth('appointment_date', now()->month)
                ->whereYear('appointment_date', now()->year)
                ->count(),
        ];

        return view('admin.staff.show', compact('staff', 'stats'));
    }

    /**
     * Show the form for editing the specified staff member.
     */
    public function edit(Staff $staff)
    {
        $staff->load(['user', 'services']);
        $services = Service::active()->get();
        
        return view('admin.staff.edit', compact('staff', 'services'));
    }

    /**
     * Update the specified staff member.
     */
    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $staff->user_id,
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
            'specialization' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'services' => 'required|array|min:1',
            'services.*' => 'exists:services,id',
            'is_available' => 'boolean'
        ]);

        // Update user account
        $userData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
        ];

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($validated['password']);
        }

        $staff->user()->update($userData);

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($staff->profile_image) {
                Storage::disk('public')->delete($staff->profile_image);
            }
            $profileImagePath = $request->file('profile_image')->store('staff-profiles', 'public');
            $staff->profile_image = $profileImagePath;
        }

        // Update staff profile
        $staff->update([
            'specialization' => $validated['specialization'] ?? null,
            'bio' => $validated['bio'] ?? null,
            'profile_image' => $staff->profile_image,
            'is_available' => $request->has('is_available') ? true : false
        ]);

        // Sync services
        $staff->services()->sync($validated['services']);

        ActivityLog::log('updated', 'staff',
            "Updated staff member '{$validated['name']}' (ID: {$staff->id}).",
            $staff
        );

        return redirect()
            ->route('admin.staff.index')
            ->with('success', 'Staff member updated successfully.');
    }

    /**
     * Remove the specified staff member.
     */
    public function destroy(Staff $staff)
    {
        // Check if staff has future appointments
        $futureAppointments = $staff->appointments()
            ->where('appointment_date', '>=', now())
            ->whereIn('status', ['pending', 'confirmed'])
            ->count();

        if ($futureAppointments > 0) {
            return redirect()
                ->route('admin.staff.index')
                ->withErrors(['error' => 'Cannot delete staff member with upcoming appointments. Please reassign or cancel appointments first.']);
        }

        // Delete profile image if exists
        if ($staff->profile_image) {
            Storage::disk('public')->delete($staff->profile_image);
        }

        $staffName = $staff->user->name ?? 'Unknown';
        $staffId   = $staff->id;

        // Delete staff and associated user
        $user = $staff->user;
        $staff->delete();
        $user->delete();

        ActivityLog::log('deleted', 'staff',
            "Deleted staff member '{$staffName}' (ID: {$staffId})."
        );

        return redirect()
            ->route('admin.staff.index')
            ->with('success', 'Staff member deleted successfully.');
    }

    public function toggleAvailability(Staff $staff)
    {
        $staff->update(['is_available' => !$staff->is_available]);

        $status = $staff->is_available ? 'available' : 'unavailable';

        ActivityLog::log('toggled', 'staff',
            "Staff member '{$staff->user->name}' marked as {$status}.",
            $staff,
            ['is_available' => $staff->is_available]
        );

        return redirect()
            ->back()
            ->with('success', "Staff member marked as {$status}.");
    }
}