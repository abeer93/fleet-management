<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Bus;
use App\Models\Trip;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\BusTrip;
use App\Models\Station;
use App\Models\Seat;

class BookingControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_request()
    {
        $busTrip = BusTrip::factory()->create();
        $seat = Seat::factory()->create(['bus_id' => $busTrip->bus_id]);
        $startStation = Station::factory()->create();
        $endStation = Station::factory()->create();

        $response = $this->postJson('/api/bookings', [
            'bus_trip_id' => $busTrip->id,
            'seat_id' => $seat->id,
            'start_station_id' => $startStation->id,
            'end_station_id' => $endStation->id,
        ]);

        $response->assertStatus(401);
    }

    public function test_data_validation_in_booking_request()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->postJson('/api/bookings', [
            'bus_trip_id' => null,
            'seat_id' => null,
            'start_station_id' => null,
            'end_station_id' => null,
        ]);

        $response->assertStatus(422)
                ->assertJsonValidationErrors(['bus_trip_id', 'seat_id', 'start_station_id', 'end_station_id']);
    }

    public function test_user_able_to_book_from_station_x_to_station_y()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $busTrip = BusTrip::factory()->create();
        $seat = Seat::factory()->create(['bus_id' => $busTrip->bus_id]);
        $trip = $busTrip->trip;

        $response = $this->postJson('/api/bookings', [
            'bus_trip_id' => $busTrip->id,
            'seat_id' => $seat->id,
            'start_station_id' => $trip->startStation->id,
            'end_station_id' => $trip->endStation->id,
        ]);

        $response->assertStatus(201)
                ->assertJson(['message' => 'Booking successful!']);
    }
    public function test_booking_with_partial_full_capacity()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $bus = Bus::factory()->create(['capacity' => 4]);
        $seat1 = Seat::factory()->create(['bus_id' => $bus->id]);
        $seat2 = Seat::factory()->create(['bus_id' => $bus->id]);
        $seat3 = Seat::factory()->create(['bus_id' => $bus->id]);
        $seat4 = Seat::factory()->create(['bus_id' => $bus->id]);

        $station1 = Station::factory()->create();
        $station2 = Station::factory()->create();
        $station3 = Station::factory()->create();
        $station4 = Station::factory()->create();
        $station5 = Station::factory()->create();
        $trip= Trip::factory()->create([
            'name' => 'cairo-Asyut',
            'start_station_id' => $station1->id,
            'end_station_id' => $station5->id,
        ]);


        $busTrip = BusTrip::factory()->create(['bus_id' => $bus->id, 'trip_id' => $trip->id]);

        Booking::factory()->create([
            'user_id' => $user->id,
            'bus_trip_id' => $busTrip->id,
            'seat_id' => $seat2->id,
            'start_station_id' => $station1->id,
            'end_station_id' => $station3->id,
        ]);

        Booking::factory()->create([
            'user_id' => $user->id,
            'bus_trip_id' => $busTrip->id,
            'seat_id' => $seat3->id,
            'start_station_id' => $station1->id,
            'end_station_id' => $station3->id,
        ]);

        Booking::factory()->create([
            'user_id' => $user->id,
            'bus_trip_id' => $busTrip->id,
            'seat_id' => $seat4->id,
            'start_station_id' => $station1->id,
            'end_station_id' => $station3->id,
        ]);

        $response = $this->postJson('/api/bookings', [
            'bus_trip_id' => $busTrip->id,
            'seat_id' => $seat1->id,
            'start_station_id' => $station3->id,
            'end_station_id' => $station5->id,
        ]);

        $response->assertStatus(201)
                ->assertJson(['message' => 'Booking successful!']);
    }
}
