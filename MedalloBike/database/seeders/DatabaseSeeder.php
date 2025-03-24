<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\CustomUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory()->count(15)->create();

        foreach ($categories as $category) {
            Product::factory()
                ->count(rand(3, 8))
                ->forCategory($category->getId())
                ->create();

            Product::factory()
                ->count(rand(1, 3))
                ->forCategory($category->getId())
                ->lowStock()
                ->create();

            Product::factory()
                ->count(rand(0, 2))
                ->forCategory($category->getId())
                ->outOfStock()
                ->create();
        }

        CustomUser::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@medallobike.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
    }
}
