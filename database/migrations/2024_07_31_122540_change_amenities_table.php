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
        Schema::table('amenities', function (Blueprint $table) {
            //
            $table->dropForeign(['room_id']);
            $table->dropColumn('room_id');
            $table->unsignedBigInteger('room_type_id');

            $table->foreign('room_type_id')->references('id')->on('room_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('amenities', function (Blueprint $table) {
            //
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->unsignedBigInteger('room_id');
            $table->dropColumn('room_type_id');
            $table->dropForeign(['room_type_id']);
        });
    }
};
