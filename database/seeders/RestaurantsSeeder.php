<?php

namespace Database\Seeders;

use App\Models\Restaurants;
use Illuminate\Database\Seeder;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restaurants::factory()->count(6)->create();
    }
}
