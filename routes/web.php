<?php
// routes/web.php

use App\Http\Controllers\Customer\AppointmentController as CustomerAppointmentController;
use App\Http\Controllers\Staff\DashboardController as StaffDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Welcome Page
Route::get('/', function () {
    if (auth()->check()) {
        return match(auth()->user()->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'staff' => redirect()->route('staff.dashboard'),
            'customer' => redirect()->route('customer.dashboard'),
            default => redirect()->route('customer.dashboard'),
        };
    }
    return view('welcome');
})->name('home');

// Authentication Routes (provided by Breeze)
require __DIR__.'/auth.php';

// Role-based redirect after login
Route::get('/dashboard', function () {
    return match(auth()->user()->role) {
        'admin' => redirect()->route('admin.dashboard'),
        'staff' => redirect()->route('staff.dashboard'),
        'customer' => redirect()->route('customer.dashboard'),
        default => redirect()->route('customer.dashboard'),
    };
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        // Upcoming appointments (future appointments, ordered by soonest first)
        $upcomingAppointments = \App\Models\Appointment::where('customer_id', auth()->id())
            ->upcoming()
            ->with(['services', 'staff.user'])
            ->orderBy('appointment_date', 'asc')
            ->limit(5)
            ->get();
        
        // Recent history (completed or cancelled appointments, latest first by actual date)
        $recentAppointments = \App\Models\Appointment::where('customer_id', auth()->id())
            ->whereIn('status', ['completed', 'cancelled'])
            ->with(['services', 'staff.user'])
            ->orderBy('appointment_date', 'desc')
            ->limit(5)
            ->get();

        return view('customer.dashboard', compact('upcomingAppointments', 'recentAppointments'));
    })->name('dashboard');
    
    // Appointments
    Route::get('/appointments', [CustomerAppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/appointments/create', [CustomerAppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [CustomerAppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/{appointment}', [CustomerAppointmentController::class, 'show'])->name('appointments.show');
    Route::post('/appointments/{appointment}/cancel', [CustomerAppointmentController::class, 'cancel'])->name('appointments.cancel');
    
    // API Endpoints for AJAX - UPDATED FOR MULTIPLE SERVICES
    // Changed from /api/staff/{service} to /api/staff with query parameters
    Route::get('/api/staff', [CustomerAppointmentController::class, 'getAvailableStaff'])->name('api.staff');
    Route::get('/api/slots', [CustomerAppointmentController::class, 'getAvailableSlots'])->name('api.slots');
});

/*
|--------------------------------------------------------------------------
| Staff Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:staff'])->prefix('staff')->name('staff.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [StaffDashboard::class, 'index'])->name('dashboard');
    
    // Appointments
    Route::get('/appointments', [StaffDashboard::class, 'appointments'])->name('appointments');
    Route::get('/appointments/{appointment}', [StaffDashboard::class, 'showAppointment'])->name('appointments.show');
    Route::post('/appointments/{appointment}/status', [StaffDashboard::class, 'updateStatus'])->name('appointments.status');
    
    // Availability
    Route::get('/availability', [StaffDashboard::class, 'availability'])->name('availability');
    Route::post('/availability', [StaffDashboard::class, 'updateAvailability'])->name('availability.update');

    Route::post('/toggle-availability', [StaffDashboard::class, 'toggleAvailability'])->name('toggle-availability');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    
    // Reports
    Route::get('/reports', [AdminDashboard::class, 'reports'])->name('reports');
    Route::get('/reports/export', [AdminDashboard::class, 'exportReport'])->name('reports.export');
    
    // Services Management
    Route::resource('services', ServiceController::class);
    Route::post('/services/{service}/toggle', [ServiceController::class, 'toggleStatus'])->name('services.toggle');
    
    // Staff Management
    Route::resource('staff', StaffController::class);
    Route::post('/staff/{staff}/toggle', [StaffController::class, 'toggleAvailability'])->name('staff.toggle');
    
    // Appointments Management
    Route::resource('appointments', AdminAppointmentController::class);
    Route::post('/appointments/{appointment}/status', [AdminAppointmentController::class, 'updateStatus'])->name('appointments.status');

    // Activity Log
    Route::get('/activity-log', [ActivityLogController::class, 'index'])->name('activity-log.index');
    Route::get('/activity-log/{activityLog}', [ActivityLogController::class, 'show'])->name('activity-log.show');
    Route::post('/activity-log/clear', [ActivityLogController::class, 'clear'])->name('activity-log.clear');

        Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
    Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('guest')->group(function () {
    // Other guest routes (login, register, etc.) usually go here

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');
});