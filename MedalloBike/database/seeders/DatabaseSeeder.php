<?php

namespace Database\Seeders;

use App\Models\CustomUser;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CustomUser::factory(10)->create();
    }
}
