<?php
// app/Models/Appointment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Appointment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'staff_id',
        'service_id', // Keep for backward compatibility
        'appointment_date',
        'end_time',
        'total_price',
        'total_duration',
        'status',
        'notes'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'appointment_date' => 'datetime',
        'end_time' => 'datetime',
        'total_price' => 'decimal:2',
        'total_duration' => 'integer',
    ];

    /**
     * Get the customer for this appointment.
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * Get the staff member for this appointment.
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    /**
     * Get the service for this appointment (single service - deprecated).
     * Kept for backward compatibility.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get all services for this appointment (multiple services).
     * This is the new relationship to use.
     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'appointment_service')
                    ->withPivot('order')
                    ->orderBy('appointment_service.order')
                    ->withTimestamps();
    }

    /**
     * Scope a query to only include upcoming appointments.
     */
    public function scopeUpcoming($query)
    {
        return $query->where('appointment_date', '>=', now())
                    ->whereIn('status', ['pending', 'confirmed']);
    }

    /**
     * Scope a query to only include today's appointments.
     */
    public function scopeToday($query)
    {
        return $query->whereDate('appointment_date', today());
    }

    /**
     * Scope a query to only include past appointments.
     */
    public function scopePast($query)
    {
        return $query->where('appointment_date', '<', now());
    }

    /**
     * Scope a query to filter by status.
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Get formatted appointment date.
     */
    public function getFormattedDateAttribute()
    {
        return $this->appointment_date->format('F d, Y');
    }

    /**
     * Get formatted appointment time.
     */
    public function getFormattedTimeAttribute()
    {
        return $this->appointment_date->format('h:i A');
    }

    /**
     * Get formatted date and time.
     */
    public function getFormattedDateTimeAttribute()
    {
        return $this->appointment_date->format('F d, Y h:i A');
    }

    /**
     * Get formatted total price.
     */
    public function getFormattedTotalPriceAttribute()
    {
        return '₱' . number_format($this->total_price, 2);
    }

    /**
     * Get formatted total duration.
     */
    public function getFormattedTotalDurationAttribute()
    {
        $hours = floor($this->total_duration / 60);
        $minutes = $this->total_duration % 60;
        
        if ($hours > 0 && $minutes > 0) {
            return "{$hours}h {$minutes}m";
        } elseif ($hours > 0) {
            return "{$hours}h";
        } else {
            return "{$minutes}m";
        }
    }

    /**
     * Get service names as a comma-separated string.
     */
    public function getServiceNamesAttribute()
    {
        return $this->services->pluck('name')->join(', ');
    }

    /**
     * Get status badge color.
     */
    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => 'warning',
            'confirmed' => 'info',
            'in_progress' => 'primary',
            'completed' => 'success',
            'cancelled' => 'danger',
            default => 'secondary',
        };
    }

    /**
     * Check if appointment can be rescheduled.
     */
    public function canBeRescheduled()
    {
        return $this->appointment_date > now() && 
               in_array($this->status, ['pending', 'confirmed']);
    }

    /**
     * Check if appointment can be cancelled.
     */
    public function canBeCancelled()
    {
        return $this->appointment_date > now() && 
               in_array($this->status, ['pending', 'confirmed']);
    }

    /**
     * Check if appointment is editable.
     */
    public function isEditable()
    {
        return $this->appointment_date > now() && 
               $this->status === 'pending';
    }
}