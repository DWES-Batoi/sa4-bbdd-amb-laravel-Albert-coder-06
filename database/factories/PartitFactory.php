<?php

namespace Database\Factories;

use App\Models\Partit;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartitFactory extends Factory
{
    protected $model = Partit::class;

    public function definition(): array
    {
        // Seleccionem dos equips diferents
        $equips = \App\Models\Equip::all();
        $equipLocal = $equips->random();
        $equipVisitant = $equips->where('id', '!=', $equipLocal->id)->random();

        return [
            // Nuevas columnas para clasificación en tiempo real
            'local_id' => $equipLocal->id,
            'visitant_id' => $equipVisitant->id,
            'estadi_id' => \App\Models\Estadi::all()->random()->id,
            'data' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'jornada' => $this->faker->numberBetween(1, 38),
            'gols_local' => $this->faker->numberBetween(0, 5),
            'gols_visitant' => $this->faker->numberBetween(0, 5),
            // Camps amb els noms dels equips (coherents amb els IDs)
            'local' => $equipLocal->nom,
            'visitant' => $equipVisitant->nom,
            'resultat' => null,
        ];
    }
}
