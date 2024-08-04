<?php

namespace Database\Factories;

use App\Models\BusTrip;
use App\Models\Bus;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusTripFactory extends Factory
{
    protected $model = BusTrip::class;

    public function definition()
    {
        return [
            'bus_id' => Bus::factory(),
            'trip_id' => Trip::factory(),
            'trip_date' => now()->toDateString(),
            'start_time' => now(),
            'arrival_time' => now()->addHours(5),
        ];
    }
}
