<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory()->count(15)->create();

        foreach ($categories as $category) {
            // Crear 3-8 productos para cada categoría
            Product::factory()
                ->count(rand(3, 8))
                ->forCategory($category->getId())
                ->create();

            // Crear algunos productos con stock bajo
            Product::factory()
                ->count(rand(1, 3))
                ->forCategory($category->getId())
                ->lowStock()
                ->create();

            // Crear algunos productos sin stock
            Product::factory()
                ->count(rand(0, 2))
                ->forCategory($category->getId())
                ->outOfStock()
                ->create();
        }
    }
}
