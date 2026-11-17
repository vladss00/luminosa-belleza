<?php
// app/Models/StaffAvailability.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class StaffAvailability extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'staff_availability';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'staff_id',
        'day_of_week',
        'start_time',
        'end_time',
        'is_available'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_available' => 'boolean',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
    ];

    /**
     * Get the staff member that owns this availability.
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    /**
     * Get formatted start time.
     */
    public function getFormattedStartTimeAttribute()
    {
        return Carbon::parse($this->start_time)->format('h:i A');
    }

    /**
     * Get formatted end time.
     */
    public function getFormattedEndTimeAttribute()
    {
        return Carbon::parse($this->end_time)->format('h:i A');
    }

    /**
     * Get formatted day of week.
     */
    public function getFormattedDayAttribute()
    {
        return ucfirst($this->day_of_week);
    }
}