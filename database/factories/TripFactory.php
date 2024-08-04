<?php

namespace Database\Factories;

use App\Models\Trip;
use App\Models\Station;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    protected $model = Trip::class;

    public function definition()
    {
        return [
            'name' => $this->faker->city . ' to ' . $this->faker->city,
            'start_station_id' => Station::factory(),
            'end_station_id' => Station::factory(),
        ];
    }
}
