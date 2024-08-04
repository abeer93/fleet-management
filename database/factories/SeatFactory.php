<?php

namespace Database\Factories;

use App\Models\Seat;
use App\Models\Bus;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeatFactory extends Factory
{
    protected $model = Seat::class;

    public function definition()
    {
        return [
            'bus_id' => Bus::factory(),
            'seat_number' => $this->faker->unique()->numberBetween(1, 50),
        ];
    }
}
