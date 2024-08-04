<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Seeder;

class BusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bus::insert([
            'number_plate' => 'ABC-1234',
            'capacity' => 12,
            'model' => 'Mercedes Sprinter',
        ]);
    }
}
