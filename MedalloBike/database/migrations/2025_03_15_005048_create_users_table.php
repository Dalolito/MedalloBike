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
        // Comprobar si la tabla ya existe
        if (Schema::hasTable('users')) {
            // Agregar las columnas adicionales que faltan
            Schema::table('users', function (Blueprint $table) {
                // Añadir solo si no existen
                if (! Schema::hasColumn('users', 'address')) {
                    $table->string('address')->nullable()->after('email_verified_at');
                }
                if (! Schema::hasColumn('users', 'role')) {
                    $table->string('role')->default('user')->after('address');
                }
                if (! Schema::hasColumn('users', 'budget')) {
                    $table->double('budget')->default(0)->after('role');
                }
            });
        } else {
            // Crear la tabla si no existe (esto normalmente no debería ocurrir)
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->string('address')->nullable();
                $table->string('role')->default('user');
                $table->double('budget')->default(0);
                $table->timestamp('email_verified_at')->nullable();
                $table->rememberToken();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No eliminamos la tabla users al hacer rollback
        // Solo eliminamos las columnas que agregamos
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'address')) {
                $table->dropColumn('address');
            }
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
            if (Schema::hasColumn('users', 'budget')) {
                $table->dropColumn('budget');
            }
        });
    }
};
