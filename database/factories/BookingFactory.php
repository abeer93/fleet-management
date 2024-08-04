<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\BusTrip;
use App\Models\Seat;
use App\Models\Station;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'seat_id' => Seat::factory(),
            'start_station_id' => Station::factory(),
            'end_station_id' => Station::factory(),
            'bus_trip_id' => BusTrip::factory(),
        ];
    }
}
