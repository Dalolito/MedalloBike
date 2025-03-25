<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Route;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory()->count(15)->create();
        $products = Product::factory()->count(30)->create();
        $routes = Route::factory()->count(20)->create();
    }
}
