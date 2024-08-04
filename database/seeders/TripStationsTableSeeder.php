<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trip;
use App\Models\Station;
use App\Models\TripStation;

class TripStationsTableSeeder extends Seeder
{
    public function run()
    {
        $stations = Station::all();
        $trip = Trip::first();

        if ($trip) {
            TripStation::create([
                'trip_id' => $trip->id,
                'station_id' => $stations->firstWhere('name', 'Cairo Central Station')->id,
                'order' => 1,
            ]);

            TripStation::create([
                'trip_id' => $trip->id,
                'station_id' => $stations->firstWhere('name', 'Giza Station')->id,
                'order' => 2,
            ]);

            TripStation::create([
                'trip_id' => $trip->id,
                'station_id' => $stations->firstWhere('name', 'AlFayyum Station')->id,
                'order' => 3,
            ]);

            TripStation::create([
                'trip_id' => $trip->id,
                'station_id' => $stations->firstWhere('name', 'AlMinya Station')->id,
                'order' => 4,
            ]);

            TripStation::create([
                'trip_id' => $trip->id,
                'station_id' => $stations->firstWhere('name', 'Asyut Station')->id,
                'order' => 5,
            ]);
        }
    }
}
