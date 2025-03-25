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
            // Primero eliminamos las columnas json
            $table->dropColumn('coordinate_start');
            $table->dropColumn('coordinate_end');

            // Luego las volvemos a crear como string (o text si prefieres)
            $table->string('coordinate_start');
            $table->string('coordinate_end');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('routes', function (Blueprint $table) {
            // Revertir el cambio: eliminar los string y restaurar como json
            $table->dropColumn('coordinate_start');
            $table->dropColumn('coordinate_end');

            $table->json('coordinate_start');
            $table->json('coordinate_end');
        });
    }
};
