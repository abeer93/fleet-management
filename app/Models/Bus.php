<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $fillable = ['number_plate', 'capacity', 'model'];

    public function trips()
    {
        return $this->belongsToMany(Trip::class)->withPivot('start_time', 'arrival_time')->withTimestamps();
    }

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
