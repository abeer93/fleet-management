<?php

namespace Database\Seeders;

use App\Models\BusTrip;
use Illuminate\Database\Seeder;
use App\Models\Bus;
use App\Models\Trip;

class BusTripTableSeeder extends Seeder
{
    public function run()
    {
        $bus = Bus::first();
        $trip = Trip::first();

        BusTrip::create([
            'bus_id' => $bus->id,
            'trip_id' => $trip->id,
            'trip_date' => now()->toDateString(),
            'start_time' => now(),
            'arrival_time' => now()->addHours(5),
        ]);
    }
}

