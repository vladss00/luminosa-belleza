<?php
// app/Http/Controllers/Admin/ServiceController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of services.
     */
    public function index()
    {
        $services = Service::withCount('appointments')
            ->orderBy('category')
            ->orderBy('name')
            ->paginate(15);

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created service.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:hair,beauty,nails,spa',
            'duration' => 'required|integer|min:15|max:480',
            'price' => 'required|numeric|min:0|max:99999.99',
            'is_active' => 'boolean'
        ]);

        $validated['is_active'] = $request->has('is_active') ? true : false;

        $service = Service::create($validated);

        ActivityLog::log('created', 'service',
            "Created new service '{$service->name}' (category: {$service->category}, price: ₱{$service->price}).",
            $service
        );

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified service.
     */
    public function show(Service $service)
    {
        $service->load(['staff.user', 'appointments' => function($query) {
            $query->latest()->limit(10);
        }]);

        $stats = [
            'total_appointments' => $service->appointments()->count(),
            'completed_appointments' => $service->appointments()->where('status', 'completed')->count(),
            'total_revenue' => $service->appointments()->where('status', 'completed')->count() * $service->price,
        ];

        return view('admin.services.show', compact('service', 'stats'));
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified service.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:hair,beauty,nails,spa',
            'duration' => 'required|integer|min:15|max:480',
            'price' => 'required|numeric|min:0|max:99999.99',
            'is_active' => 'boolean'
        ]);

        $validated['is_active'] = $request->has('is_active') ? true : false;

        $service->update($validated);

        ActivityLog::log('updated', 'service',
            "Updated service '{$service->name}'.",
            $service
        );

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified service.
     */
    public function destroy(Service $service)
    {
        // Check if service has appointments
        if ($service->appointments()->count() > 0) {
            return redirect()
                ->route('admin.services.index')
                ->withErrors(['error' => 'Cannot delete service with existing appointments. Please deactivate instead.']);
        }

        $service->delete();

        ActivityLog::log('deleted', 'service',
            "Deleted service '{$service->name}'."
        );

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }

    public function toggleStatus(Service $service)
    {
        $service->update(['is_active' => !$service->is_active]);

        $status = $service->is_active ? 'activated' : 'deactivated';

        ActivityLog::log('toggled', 'service',
            "Service '{$service->name}' was {$status}.",
            $service,
            ['is_active' => $service->is_active]
        );

        return redirect()
            ->back()
            ->with('success', "Service {$status} successfully.");
    }
}