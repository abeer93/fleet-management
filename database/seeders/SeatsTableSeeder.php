<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Seeder;

class SeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seats = [];
        for ($i = 1; $i <= 12; $i++) {
            $seats[] = ['bus_id' => 1, 'seat_number' => 'S' . $i];
        }
        Seat::insert($seats);
    }
}
