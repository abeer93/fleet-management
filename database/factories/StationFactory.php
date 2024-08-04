<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Station;
use Illuminate\Database\Eloquent\Factories\Factory;

class StationFactory extends Factory
{
    protected $model = Station::class;

    public function definition()
    {
        return [
            'city_id' => City::factory(),
            'name' => $this->faker->city,
        ];
    }
}
