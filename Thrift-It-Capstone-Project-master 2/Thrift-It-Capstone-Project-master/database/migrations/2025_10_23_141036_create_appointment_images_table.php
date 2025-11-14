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
        Schema::create('appointment_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appointment_id');
            $table->string('image_path');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('appointment_id')
                  ->references('appointmentid')
                  ->on('appointments')
                  ->onDelete('cascade'); // optional: deletes images if appointment is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_images');
    }
};
