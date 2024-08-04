<?php

namespace Database\Seeders;

use App\Models\City;
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
            ['city_id' => City::firstWhere('name', 'Cairo')->id, 'name' => 'Cairo Central Station'],
            ['city_id' => City::firstWhere('name', 'Giza')->id, 'name' => 'Giza Station'],
            ['city_id' => City::firstWhere('name', 'AlFayyum')->id, 'name' => 'AlFayyum Station'],
            ['city_id' => City::firstWhere('name', 'AlMinya')->id, 'name' => 'AlMinya Station'],
            ['city_id' => City::firstWhere('name', 'Asyut')->id, 'name' => 'Asyut Station'],
        ]);
    }
}
