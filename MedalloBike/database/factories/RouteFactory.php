<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RouteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'difficulty' => $this->faker->numberBetween(1, 5),
            'type' => $this->faker->randomElement(['mountain', 'urban', 'trail', 'mixed']),
            'zone' => $this->faker->city(),
            'imageMap' => 'img/Bike.jpg',
            'coordinate_start' => $this->faker->randomElement(['6.2442, -75.5812', '10.2442, -65.5812', '40.730610, -73.935242', '46.8182, 8.2275']),
            'coordinate_end' => $this->faker->randomElement(['35.6895, 139.6917', '-33.9249, 18.4241', '51.5074, -0.1278', '-34.6037, -58.3816']),
        ];
    }
}
