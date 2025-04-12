<?php
/**
 * Developed by [Your Name].
 */
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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('difficulty');
            $table->string('type');
            $table->string('zone');
            $table->string('imageMap')->default('image_default.png');
            $table->string('coordinateStart');
            $table->string('coordinateEnd');
            $table->timestamps();
        });
        
        // Create the relationship with reviews
        Schema::create('review_route', function (Blueprint $table) {
            $table->id();
            $table->foreignId('route_id')->constrained('routes');
            $table->foreignId('review_id')->constrained('reviews');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_route'); // Dropping pivot table first
        Schema::dropIfExists('routes');
    }
};
