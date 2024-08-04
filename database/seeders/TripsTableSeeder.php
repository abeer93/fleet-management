<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Seeder;

class TripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trip::insert([
            ['name' => 'Cairo-Asyut', 'start_station_id' => 1, 'end_station_id' => 5],
        ]);
    }
}
