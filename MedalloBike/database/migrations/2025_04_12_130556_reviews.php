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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('qualification');
            $table->text('description');
            
            // Relación con User
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Relación opcional con Product o Route
            $table->foreignId('product_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('route_id')->nullable()->constrained()->onDelete('set null');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};