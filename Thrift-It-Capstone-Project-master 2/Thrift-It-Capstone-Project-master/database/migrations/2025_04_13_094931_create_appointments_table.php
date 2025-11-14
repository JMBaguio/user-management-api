<?php

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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('appointmentid'); // Primary key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Requesting user
            $table->foreignId('upcycler_id')->constrained('users')->onDelete('cascade'); // Upcycler
            $table->string('appdetails', 255)->nullable(); // Appointment details
            $table->string('apptype', 20); // Appointment type
            $table->string('appstatus', 20)->default('pending'); // Appointment status
            $table->dateTime('appdate'); // Appointment date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
