<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('role_permissions', function (Blueprint $table) {
            $table->foreign('permission_id')->references('id')->on('permissions');
        });
    }

    public function down()
    {
        Schema::table('role_permissions', function (Blueprint $table) {
            $table->dropForeign(['permission_id']);
        });
    }
};
