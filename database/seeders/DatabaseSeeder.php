<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            CitiesTableSeeder::class,
            StationsTableSeeder::class,
            TripsTableSeeder::class,
            TripStationsTableSeeder::class,
            BusesTableSeeder::class,
            BusTripTableSeeder::class,
            SeatsTableSeeder::class,
            BookingsTableSeeder::class,
        ]);


    }
}
