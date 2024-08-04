<?php

namespace App\Services;

use App\Models\BusTrip;
use App\Models\Booking;
use App\Models\Seat;

class BookingService
{
    public function getAvailableSeats(BusTrip $busTrip, $startStationId, $endStationId)
    {
        $bookedSeats = Booking::where('bus_trip_id', $busTrip->id)
            ->get(['seat_id', 'start_station_id', 'end_station_id'])
            ->toArray();

        $allSeats = Seat::where('bus_id', $busTrip->bus_id)->pluck('id')->toArray();

        $availableSeats = array_fill_keys($allSeats, true);
        foreach ($bookedSeats as $booking) {
            if ($startStationId < $booking['end_station_id'] && $endStationId > $booking['start_station_id']) {
                $availableSeats[$booking['seat_id']] = false;
            }
        }

        $availableSeats = array_keys(array_filter($availableSeats));

        return $availableSeats;
    }
}
