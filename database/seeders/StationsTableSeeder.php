<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Seeder;

class StationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Station::insert([
            ['city_id' => 1, 'name' => 'Cairo Central Station'],
            ['city_id' => 2, 'name' => 'Giza Station'],
            ['city_id' => 3, 'name' => 'AlFayyum Station'],
            ['city_id' => 4, 'name' => 'AlMinya Station'],
            ['city_id' => 5, 'name' => 'Asyut Station'],
        ]);
    }
}
