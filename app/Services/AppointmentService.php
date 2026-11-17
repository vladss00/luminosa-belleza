<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\StaffAvailability;
use App\Models\StaffLeave;
use Carbon\Carbon;

class AppointmentService
{
    /**
     * Check if there's a scheduling conflict
     */
    public function checkConflict($staffId, $appointmentDate, $duration, $excludeAppointmentId = null)
    {
        $endTime = Carbon::parse($appointmentDate)->addMinutes($duration);

        $query = Appointment::where('staff_id', $staffId)
            ->whereIn('status', ['pending', 'confirmed', 'in_progress'])
            ->where(function ($q) use ($appointmentDate, $endTime) {
                $q->whereBetween('appointment_date', [$appointmentDate, $endTime])
                  ->orWhere(function ($q2) use ($appointmentDate, $endTime) {
                      $q2->where('appointment_date', '<=', $appointmentDate)
                         ->whereRaw('DATE_ADD(appointment_date, INTERVAL duration MINUTE) > ?', [$appointmentDate]);
                  });
            });

        if ($excludeAppointmentId) {
            $query->where('id', '!=', $excludeAppointmentId);
        }

        return $query->exists();
    }

    /**
     * Get available time slots for a staff member on a specific date
     */
    public function getAvailableTimeSlots($staffId, $date, $serviceDuration)
    {
        $date = Carbon::parse($date);
        $dayOfWeek = strtolower($date->format('l'));

        // Check if staff is on leave
        $isOnLeave = StaffLeave::where('staff_id', $staffId)
            ->whereDate('leave_date', $date)
            ->exists();

        if ($isOnLeave) {
            return [];
        }

        // Get staff availability for the day
        $availability = StaffAvailability::where('staff_id', $staffId)
            ->where('day_of_week', $dayOfWeek)
            ->where('is_available', true)
            ->first();

        if (!$availability) {
            return [];
        }

        // Generate time slots
        $slots = [];
        $currentTime = Carbon::parse($date->format('Y-m-d') . ' ' . $availability->start_time);
        $endTime = Carbon::parse($date->format('Y-m-d') . ' ' . $availability->end_time);

        // If the date is today, start from current time + buffer
        if ($date->isToday()) {
            $now = now()->addMinutes(30); // 30 minute buffer
            if ($currentTime->lt($now)) {
                $currentTime = $now->copy()->startOfHour();
                if ($currentTime->minute >= 30) {
                    $currentTime->addMinutes(30)->startOfMinute();
                }
            }
        }

        while ($currentTime->copy()->addMinutes($serviceDuration)->lte($endTime)) {
            $slotEnd = $currentTime->copy()->addMinutes($serviceDuration);
            
            // Check if slot has conflict
            if (!$this->checkConflict($staffId, $currentTime, $serviceDuration)) {
                $slots[] = [
                    'start' => $currentTime->format('H:i'),
                    'end' => $slotEnd->format('H:i'),
                    'display' => $currentTime->format('g:i A') . ' - ' . $slotEnd->format('g:i A'),
                ];
            }

            $currentTime->addMinutes(30); // 30-minute intervals
        }

        return $slots;
    }

    /**
     * Get appointments statistics for dashboard
     */
    public function getStatistics($startDate = null, $endDate = null)
    {
        $query = Appointment::query();

        if ($startDate && $endDate) {
            $query->whereBetween('appointment_date', [$startDate, $endDate]);
        }

        return [
            'total' => $query->count(),
            'pending' => $query->clone()->where('status', 'pending')->count(),
            'confirmed' => $query->clone()->where('status', 'confirmed')->count(),
            'completed' => $query->clone()->where('status', 'completed')->count(),
            'cancelled' => $query->clone()->where('status', 'cancelled')->count(),
            'revenue' => $query->clone()->where('status', 'completed')->sum('total_price'),
        ];
    }

    /**
     * Get popular services
     */
    public function getPopularServices($limit = 5)
    {
        return Appointment::selectRaw('service_id, COUNT(*) as booking_count')
            ->with('service')
            ->where('status', 'completed')
            ->groupBy('service_id')
            ->orderByDesc('booking_count')
            ->limit($limit)
            ->get();
    }

    /**
     * Get peak hours
     */
    public function getPeakHours()
    {
        return Appointment::selectRaw('HOUR(appointment_date) as hour, COUNT(*) as count')
            ->where('status', '!=', 'cancelled')
            ->groupBy('hour')
            ->orderBy('hour')
            ->get()
            ->pluck('count', 'hour');
    }
}