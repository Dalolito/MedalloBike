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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();  // ID de la ruta
            $table->string('name');  // Nombre de la ruta
            $table->text('description');  // Descripción de la ruta
            $table->integer('difficulty');  // Dificultad de la ruta
            $table->string('type');  // Tipo de la ruta
            $table->string('zone');  // Zona de la ruta
            $table->string('imageMap')->default('image_default.png');  // Imagen del mapa de la ruta
            $table->string('coordinateStart');  // Coordenadas de inicio
            $table->string('coordinateEnd');  // Coordenadas de fin
            $table->timestamps();  // Timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
