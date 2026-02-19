<?php

namespace Database\Seeders;

use App\Models\Partit;
use Illuminate\Database\Seeder;

class PartitsSeeder extends Seeder
{
    public function run(): void
    {
        Partit::factory()->count(10)->create();
    }
}
