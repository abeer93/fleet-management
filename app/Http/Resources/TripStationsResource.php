<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TripStationsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'station_name' => $this->station->name,
            'order' => $this->order,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
        ];
    }
}

