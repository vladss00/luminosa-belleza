<?php
// app/Models/Staff.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'staff';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'specialization',
        'bio',
        'profile_image',
        'is_available'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_available' => 'boolean',
    ];

    /**
     * Get the user that owns the staff profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the services this staff member can perform.
     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'staff_service');
    }

    /**
     * Get all appointments for this staff member.
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Get the availability schedule for this staff member.
     */
    public function availability()
    {
        return $this->hasMany(StaffAvailability::class);
    }

    /**
     * Scope a query to only include available staff.
     */
    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    /**
     * Check if staff is available on a specific day.
     */
    public function isAvailableOnDay($dayOfWeek)
    {
        return $this->availability()
            ->where('day_of_week', strtolower($dayOfWeek))
            ->where('is_available', true)
            ->exists();
    }

    /**
     * Get staff full name.
     */
    public function getFullNameAttribute()
    {
        return $this->user->name;
    }

    /**
     * Get profile image URL.
     */
    public function getProfileImageUrlAttribute()
    {
        if ($this->profile_image) {
            return asset('storage/' . $this->profile_image);
        }
        return asset('images/default-avatar.png');
    }
}