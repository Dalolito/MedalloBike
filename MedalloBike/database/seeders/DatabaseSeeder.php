<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CustomUser;
use App\Models\Product;
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
    }
}
