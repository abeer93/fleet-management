<?php

namespace Database\Seeders;

use App\Models\BusTrip;
use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\User;
use App\Models\Seat;
use App\Models\Station;

class BookingsTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        $seat = Seat::first();
        $startStation = Station::where('name', 'Cairo Central Station')->first();
        $endStation = Station::where('name', 'AlMinya Station')->first();

        Booking::create([
            'bus_trip_id' => BusTrip::first()->id,
            'user_id' => $user->id,
            'seat_id' => $seat->id,
            'start_station_id' => $startStation->id,
            'end_station_id' => $endStation->id,
        ]);
    }
}
