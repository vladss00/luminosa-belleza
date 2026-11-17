<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Policies\AppointmentPolicy;
use App\Models\Appointment;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    protected $policies = [
    Appointment::class => AppointmentPolicy::class,
];
}
