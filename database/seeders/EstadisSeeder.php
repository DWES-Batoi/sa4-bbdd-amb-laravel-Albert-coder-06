<?php

namespace Database\Seeders;

use App\Models\Estadi;
use Illuminate\Database\Seeder;

class EstadisSeeder extends Seeder
{
    public function run(): void
    {
        Estadi::firstOrCreate(['nom' => 'Camp Nou',            'capacitat' => 99000]);
        Estadi::firstOrCreate(['nom' => 'Wanda Metropolitano', 'capacitat' => 68000]);
        Estadi::firstOrCreate(['nom' => 'Santiago Bernabéu',   'capacitat' => 81000]);

        // Opcional: per comprovar que s'han creat
        dump('EstadisSeeder - després de crear:', Estadi::count());
    }
}