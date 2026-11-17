<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AppointmentService;

class AppointmentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
{
    $this->app->singleton(AppointmentService::class, function ($app) {
        return new AppointmentService();
    });
}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
