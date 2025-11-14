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
            $table->dropColumn(['apptype', 'appstatus']);
        });
        Schema::table('appointments', function (Blueprint $table) {
            $table->enum('apptype', ['Resize', 'Customize', 'Patchwork', 'Fabric Dyeing']); // Add your types
            $table->enum('appstatus', ['pending', 'approved', 'declined', 'completed'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn(['apptype', 'appstatus']);
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->string('apptype', 20);
            $table->string('appstatus', 20)->default('pending');

        });
    }
};
