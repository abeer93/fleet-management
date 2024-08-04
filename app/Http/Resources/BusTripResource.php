<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BusTripResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'bus' => [
                'id' => $this->bus->id,
                'number_plate' => $this->bus->number_plate,
                'capacity' => $this->bus->capacity,
                'model' => $this->bus->model,
            ],
            'trip' => [
                'id' => $this->trip->id,
                'name' => $this->trip->name,
                'start_station_id' => $this->trip->start_station_id,
                'end_station_id' => $this->trip->end_station_id,
                'stations' => TripStationsResource::collection($this->trip->tripStations),
            ],
            'date' => Carbon::parse($this->trip_date)->format('Y-m-d H:i:s'),
            'start_time' => $this->start_time,
            'arrival_time' => $this->arrival_time,
            'available_seats_count' => $this->bus->capacity - $this->bookings()->count()
        ];
    }
}

