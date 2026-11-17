<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the staff profile for the user.
     */
    public function staff()
    {
        return $this->hasOne(Staff::class);
    }

    /**
     * Get all appointments for the user (as customer).
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'customer_id');
    }

    /**
     * Check if user is an admin.
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is a staff member.
     */
    public function isStaff()
    {
        return $this->role === 'staff';
    }

    /**
     * Check if user is a customer.
     */
    public function isCustomer()
    {
        return $this->role === 'customer';
    }

    /**
     * Get the user's display name.
     */
    public function getDisplayNameAttribute()
    {
        return $this->name;
    }

    /**
     * Get the user's initials.
     */
    public function getInitialsAttribute()
    {
        $names = explode(' ', $this->name);
        $initials = '';
        foreach ($names as $name) {
            $initials .= strtoupper(substr($name, 0, 1));
        }
        return $initials;
    }
}