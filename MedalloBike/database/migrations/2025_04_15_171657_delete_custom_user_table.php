<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('custom_users')) {
            Schema::dropIfExists('custom_users');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};
