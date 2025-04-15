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
        // Primero, elimina las restricciones de clave foránea existentes
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        // Luego actualiza las referencias para que apunten a la tabla 'users'
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        // Si hay otras tablas con referencias a users, repite para ellas
        // Por ejemplo, para reviews:
        if (Schema::hasTable('reviews')) {
            Schema::table('reviews', function (Blueprint $table) {
                if (Schema::hasColumn('reviews', 'user_id')) {
                    $table->dropForeign(['user_id']);
                    $table->foreign('user_id')->references('id')->on('users');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revertir los cambios en caso de rollback
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')->references('id')->on('users');
        });

        if (Schema::hasTable('reviews')) {
            Schema::table('reviews', function (Blueprint $table) {
                if (Schema::hasColumn('reviews', 'user_id')) {
                    $table->dropForeign(['user_id']);
                    $table->foreign('user_id')->references('id')->on('users');
                }
            });
        }
    }
};
