<?php

namespace Database\Factories;

use App\Models\Partit;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartitFactory extends Factory
{
    protected $model = Partit::class;

    public function definition(): array
    {
        return [
            'local' => $this->faker->city . ' FC',
            'visitant' => $this->faker->city . ' CF',
            'data' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'resultat' => $this->faker->randomElement(['1-0', '0-1', '2-2', '3-1', '0-0', null]),
        ];
    }
}
