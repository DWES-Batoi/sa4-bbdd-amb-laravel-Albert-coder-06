<?php

namespace Database\Factories;

use App\Models\Jugadora;
use App\Models\Equip;
use Illuminate\Database\Eloquent\Factories\Factory;

class JugadoraFactory extends Factory
{
    protected $model = Jugadora::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->unique()->name,
            'posicio' => $this->faker->randomElement(['Portera', 'Defensa', 'Migcampista', 'Davantera']),
            'equip' => Equip::factory(),
        ];
    }
}
