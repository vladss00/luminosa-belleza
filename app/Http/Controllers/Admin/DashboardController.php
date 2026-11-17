<?php
// app/Http/Controllers/Admin/DashboardController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\Staff;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard.
     */
    public function index()
    {
        // Basic statistics
        $stats = [
            'total_customers' => User::where('role', 'customer')->count(),
            'total_staff' => Staff::count(),
            'total_services' => Service::count(),
            'today_appointments' => Appointment::whereDate('appointment_date', today())->count(),
            'pending_appointments' => Appointment::where('status', 'pending')->count(),
            'confirmed_appointments' => Appointment::where('status', 'confirmed')
                ->where('appointment_date', '>=', now())
                ->count(),
            'this_month_appointments' => Appointment::whereMonth('appointment_date', now()->month)
                ->whereYear('appointment_date', now()->year)
                ->count(),
            'this_month_revenue' => Appointment::where('status', 'completed')
                ->whereMonth('appointment_date', now()->month)
                ->whereYear('appointment_date', now()->year)
                ->join('services', 'appointments.service_id', '=', 'services.id')
                ->sum('services.price')
        ];

        // Recent appointments
        $recentAppointments = Appointment::with(['customer', 'staff.user', 'service'])
            ->latest()
            ->limit(10)
            ->get();

        // Popular services this month
        $popularServices = Service::withCount(['appointments' => function($query) {
            $query->where('status', 'completed')
                  ->whereMonth('appointment_date', now()->month)
                  ->whereYear('appointment_date', now()->year);
        }])
        ->having('appointments_count', '>', 0)
        ->orderBy('appointments_count', 'desc')
        ->limit(5)
        ->get();

        // Today's schedule overview
        $todaySchedule = Appointment::with(['customer', 'staff.user', 'service'])
            ->whereDate('appointment_date', today())
            ->orderBy('appointment_date')
            ->get();

        // Appointments by status for chart
        $appointmentsByStatus = Appointment::select('status', DB::raw('count(*) as count'))
            ->whereMonth('appointment_date', now()->month)
            ->whereYear('appointment_date', now()->year)
            ->groupBy('status')
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'recentAppointments',
            'popularServices',
            'todaySchedule',
            'appointmentsByStatus'
        ));
    }

    /**
     * Display reports page.
     */
    public function reports(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', now()->endOfMonth()->format('Y-m-d'));

        // Appointments in date range
        $appointments = Appointment::with(['customer', 'staff.user', 'service'])
            ->whereBetween('appointment_date', [$startDate, $endDate])
            ->orderBy('appointment_date')
            ->get();

        // Revenue calculation
        $revenue = $appointments->where('status', 'completed')
            ->sum(function($appointment) {
                return $appointment->service->price;
            });

        // Service breakdown
        $serviceBreakdown = $appointments->groupBy('service.name')
            ->map(function($group) {
                $completed = $group->where('status', 'completed');
                return [
                    'count' => $group->count(),
                    'completed' => $completed->count(),
                    'revenue' => $completed->sum(function($appointment) {
                        return $appointment->service->price;
                    })
                ];
            });

        // Staff performance
        $staffPerformance = $appointments->groupBy('staff.user.name')
            ->map(function($group) {
                $completed = $group->where('status', 'completed');
                return [
                    'total_appointments' => $group->count(),
                    'completed' => $completed->count(),
                    'cancelled' => $group->where('status', 'cancelled')->count(),
                    'revenue' => $completed->sum(function($appointment) {
                        return $appointment->service->price;
                    })
                ];
            });

        // Daily appointments count
        $dailyAppointments = $appointments->groupBy(function($appointment) {
            return $appointment->appointment_date->format('Y-m-d');
        })->map(function($group) {
            return $group->count();
        });

        return view('admin.reports', compact(
            'appointments',
            'revenue',
            'serviceBreakdown',
            'staffPerformance',
            'dailyAppointments',
            'startDate',
            'endDate'
        ));
    }

    /**
     * Export reports to PDF.
     */
    public function exportReport(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', now()->endOfMonth()->format('Y-m-d'));

        $appointments = Appointment::with(['customer', 'staff.user', 'service'])
            ->whereBetween('appointment_date', [$startDate, $endDate])
            ->orderBy('appointment_date')
            ->get();

        $revenue = $appointments->where('status', 'completed')
            ->sum(function($appointment) {
                return $appointment->service->price;
            });

        $pdf = \PDF::loadView('admin.reports-pdf', compact('appointments', 'revenue', 'startDate', 'endDate'));
        
        return $pdf->download('luminosa-belleza-report-' . $startDate . '-to-' . $endDate . '.pdf');
    }
}