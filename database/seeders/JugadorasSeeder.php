<?php

namespace Database\Seeders;

use App\Models\Jugadora;
use App\Models\Equip;
use Illuminate\Database\Seeder;

class JugadorasSeeder extends Seeder
{
    public function run(): void
    {
        $equips = Equip::all();

        if ($equips->isEmpty()) {
            $equips = Equip::factory()->count(5)->create();
        }

        foreach ($equips as $equip) {
            Jugadora::factory()->count(5)->create([
                'equip' => $equip->id,
            ]);
        }
    }
}
