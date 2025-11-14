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
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn(['appstatus']);
        });
        Schema::table('appointments', function (Blueprint $table) {
            $table->enum('appstatus', ['pending', 'approved', 'declined', 'completed','cancelled'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('appstatus')->default('pending'); // revert to previous state, or drop the column entirely
        });
    }
};
