<?php

namespace App\Http\Controllers;

use App\Filters\FilterHandler;
use App\Http\Requests\AvailableSeatsRequest;
use App\Http\Requests\ListTripsRequest;
use App\Http\Resources\BusTripResource;
use App\Models\BusTrip;
use App\Services\BookingService;

class TripController extends Controller
{
    public function __construct(protected BookingService $bookingService, protected FilterHandler $filterHandler)
    {
    }

    public function listTrips(ListTripsRequest $request)
    {
        $query = BusTrip::with(['bus', 'trip']);

        $query = $this->filterHandler->apply($request, $query);

        $busTrips = $query->get();

        return BusTripResource::collection($busTrips);
    }

    public function availableSeats(AvailableSeatsRequest $request, $bus_trip_id)
    {
        $busTrip = BusTrip::find($bus_trip_id);

        if (!$busTrip) {
            return response()->json(['error' => 'No matching bus trip found.'], 404);
        }

        $availableSeats = $this->bookingService->getAvailableSeats(
            $busTrip,
            $request->start_station_id,
            $request->end_station_id
        );

        return response()->json(['available_seats' => $availableSeats]);
    }
}

