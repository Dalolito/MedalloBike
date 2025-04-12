<?php

namespace Database\Factories;

use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

class RouteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Route::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company . ' ' . $this->faker->word,  // Nombre de la ruta
            'description' => $this->faker->text(200),  // Descripción de la ruta
            'difficulty' => $this->faker->numberBetween(1, 5),  // Dificultad de la ruta (1 a 5)
            'type' => $this->faker->randomElement(['Mountain', 'Road', 'Hybrid']),  // Tipo de ruta
            'zone' => $this->faker->city,  // Zona de la ruta
            'imageMap' => $this->faker->numberBetween(1, 5),  
            'coordinateStart' => $this->faker->latitude . ', ' . $this->faker->longitude,  // Coordenadas de inicio
            'coordinateEnd' => $this->faker->latitude . ', ' . $this->faker->longitude,  // Coordenadas de fin
        ];
    }
}
