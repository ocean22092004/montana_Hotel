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
            $table->decimal('price_per_day', 10, 2)->after('price_per_night');
            $table->decimal('price_per_hour', 10, 2)->after('price_per_night');
            $table->enum('status', ['available', 'booked', 'occupied', 'housekeeping', 'Maintenance']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('price_per_day');
            $table->dropColumn('price_per_hour');
            $table->dropColumn('status');
        });
    }
};
