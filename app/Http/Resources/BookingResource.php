<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'start_station' => [
                'id' => $this->start_station_id,
                'name' => $this->startStation->name
            ],
            'end_station' => [
                'id' => $this->end_station_id,
                'name' => $this->endStation->name
            ],
            'leave_date' => Carbon::parse($this->busTrip->trip_date)->format('Y-m-d H:i:s'),
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
        ];
    }
}

