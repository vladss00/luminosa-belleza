<?php
// database/migrations/2024_01_31_000002_modify_appointments_table_for_multiple_services.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            // Add total price and total duration columns
            $table->decimal('total_price', 10, 2)->after('service_id')->default(0);
            $table->integer('total_duration')->after('total_price')->default(0); // in minutes
            
            // Make service_id nullable for backward compatibility
            // We'll keep it for now but use the pivot table for multiple services
            $table->unsignedBigInteger('service_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn(['total_price', 'total_duration']);
            
            // Restore service_id to not nullable
            $table->unsignedBigInteger('service_id')->nullable(false)->change();
        });
    }
};