<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(200, 9000),
            'stock' => $this->faker->numberBetween(1, 50),
            'category_id' => Category::factory(), // si tiene relación con categorías
            'brand' => $this->faker->company(),
            'image' => 'img/products/default.jpg',
            'state' => 'available',
        ];
    }
}
