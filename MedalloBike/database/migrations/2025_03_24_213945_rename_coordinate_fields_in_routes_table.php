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
        Schema::table('routes', function (Blueprint $table) {
            $table->renameColumn('coordinateStart', 'coordinate_start');
            $table->renameColumn('coordinateEnd', 'coordinate_end');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('routes', function (Blueprint $table) {
            $table->renameColumn('coordinate_start', 'coordinateStart');
            $table->renameColumn('coordinate_end', 'coordinateEnd');
        });
    }
};
