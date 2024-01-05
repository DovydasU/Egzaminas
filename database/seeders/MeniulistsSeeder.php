<?php

namespace Database\Seeders;

use App\Models\Meniulists;
use Illuminate\Database\Seeder;

class MeniulistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Meniulists::factory()->count(6)->create();
    }
}
