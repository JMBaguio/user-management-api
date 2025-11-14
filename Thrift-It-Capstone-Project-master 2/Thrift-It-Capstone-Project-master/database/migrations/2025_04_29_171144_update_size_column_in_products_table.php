<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, create a temporary column
        Schema::table('products', function (Blueprint $table) {
            $table->string('size_temp', 10)->nullable()->after('size');
        });

        // Copy data from old column to new column
        DB::statement('UPDATE products SET size_temp = size');

        // Drop the old column
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('size');
        });

        // Rename the temporary column
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('size_temp', 'size');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // First, create a temporary column
        Schema::table('products', function (Blueprint $table) {
            $table->enum('size_temp', ['S', 'M', 'L', 'XL', 'XXL', '3XL', '4XL', '5XL'])->nullable()->after('size');
        });

        // Copy data from new column to old column
        DB::statement('UPDATE products SET size_temp = size WHERE size IN ("S", "M", "L", "XL", "XXL", "3XL", "4XL", "5XL")');

        // Drop the new column
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('size');
        });

        // Rename the temporary column
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('size_temp', 'size');
        });
    }
};
