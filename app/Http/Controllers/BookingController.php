<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Http\Resources\BookingResource;
use App\Models\BusTrip;
use App\Services\BookingService;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function __construct(protected BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function store(BookingRequest $request)
    {
        $busTrip = BusTrip::find($request->bus_trip_id);

        if (!$busTrip) {
            return response()->json(['error' => 'this trip is no more exist.'], 404);
        }

        $availableSeats = $this->bookingService->getAvailableSeats(
            $busTrip,
            $request->start_station_id,
            $request->end_station_id
        );

        if (!in_array($request->seat_id, $availableSeats)) {
            return response()->json(['error' => 'The seat is not available for the selected segment.', 'available_seats' => $availableSeats], 400);
        }

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'seat_id' => $request->seat_id,
            'start_station_id' => $request->start_station_id,
            'end_station_id' => $request->end_station_id,
            'bus_trip_id' => $busTrip->id,
        ]);

        return response()->json(['message' => 'Booking successful!', 'booking' => new BookingResource($booking)], 201);
    }
}

