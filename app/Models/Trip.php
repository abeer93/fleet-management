<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_station_id', 'end_station_id'];

    public function buses()
    {
        return $this->belongsToMany(Bus::class)->withPivot('start_time', 'arrival_time')->withTimestamps();
    }

    public function startStation()
    {
        return $this->belongsTo(Station::class, 'start_station_id');
    }

    public function endStation()
    {
        return $this->belongsTo(Station::class, 'end_station_id');
    }

    public function tripStations()
    {
        return $this->hasMany(TripStation::class);
    }
}
