<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Cambiar nombre de la tabla
        Schema::rename('review', 'reviews');

        // Cambiar nombre de la columna dentro de la nueva tabla
        Schema::table('reviews', function (Blueprint $table) {
            $table->renameColumn('state', 'approvedState');
        });
    }

    public function down(): void
    {
        // Revertir el cambio de columna
        Schema::table('reviews', function (Blueprint $table) {
            $table->renameColumn('approvedState', 'state');
        });

        // Revertir el cambio de nombre de tabla
        Schema::rename('reviews', 'review');
    }
};
