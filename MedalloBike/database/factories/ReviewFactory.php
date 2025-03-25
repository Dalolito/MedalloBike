<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'quantity' => $this->faker->numberBetween($min = 1, $max = 5),
            'review' => $this->faker->company,
            'state' => false,
        ];
    }
}
