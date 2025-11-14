<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            // Drop the old column
            $table->dropColumn('status');
        });

        Schema::table('reports', function (Blueprint $table) {
            // Recreate with new ENUM values
            $table->enum('status', ['pending', 'rejected', 'resolved'])->default('pending');
        });
    }

    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('reports', function (Blueprint $table) {
            $table->enum('status', ['pending', 'reviewed', 'resolved'])->default('pending');
        });
    }
};
