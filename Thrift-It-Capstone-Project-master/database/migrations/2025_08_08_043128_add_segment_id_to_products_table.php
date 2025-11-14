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
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('segment_id')->nullable()->constrained('segments')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'segment_id')) {
                // Drop FK first, then the column
                try { $table->dropForeign(['segment_id']); } catch (\Throwable $e) {}
                try { $table->dropColumn('segment_id'); } catch (\Throwable $e) {}
            }
        });
    }
};
