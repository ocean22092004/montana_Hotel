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
        Schema::table('rooms', function (Blueprint $table) {
            $table->enum('status', ['available', 'booked', 'occupied', 'housekeeping', 'Maintenance'])->default('available')->after('price_per_day');
            $table->unsignedInteger('price_per_night')->change();
            $table->unsignedInteger('price_per_hour')->change();
            $table->unsignedInteger('price_per_day')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->decimal('price_per_night', 10, 2)->change();
            $table->decimal('price_per_hour', 10, 2)->change();
            $table->decimal('price_per_day', 10, 2)->change();
        });
    }
};
