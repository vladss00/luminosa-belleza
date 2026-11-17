<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('action');           // e.g. created, updated, deleted, status_changed
            $table->string('module');           // e.g. appointment, service, staff, auth
            $table->string('description');      // human-readable sentence
            $table->string('subject_type')->nullable();  // model class
            $table->unsignedBigInteger('subject_id')->nullable(); // model id
            $table->json('properties')->nullable();       // old/new values snapshot
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'created_at']);
            $table->index(['module', 'created_at']);
            $table->index(['subject_type', 'subject_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
