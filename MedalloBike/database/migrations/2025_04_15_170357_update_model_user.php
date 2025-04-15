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
        Schema::table('users', function (Blueprint $table) {
            // Comprueba si las columnas ya existen antes de añadirlas
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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['address', 'role', 'budget']);
        });
    }
};
