<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = ['bus_id', 'seat_number'];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
}