<?php

namespace Database\Factories;

use App\Models\Bus;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusFactory extends Factory
{
    protected $model = Bus::class;

    public function definition()
    {
        return [
            'number_plate' => strtoupper($this->faker->unique()->bothify('??###')),
            'capacity' => 12,
            'model' => $this->faker->word . ' ' . $this->faker->numberBetween(2000, 2024),
        ];
    }
}
