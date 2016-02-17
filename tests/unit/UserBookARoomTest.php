<?php

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserBookARoomTest extends TestCase
{
	use DatabaseMigrations;

    public function test_a_user_can_book_a_room_with_correct_minimum_stay()
    {
        $user = factory(App\User::class)->create([]);
        $room = factory(App\Room::class)->create([
            'minimum_stay'  => 2
        ]);

        $this->actingAs($user);

        $checkInDate = Carbon::now()->addDays(3);
        $checkOutDate = Carbon::now()->addDays(7);

        $response = $this->call('POST', '/bookings/'.$room->id, [
            'roomId'    => $room->id,
            'checkIn'   => $checkInDate->toDateString(),
            'checkOut' => $checkOutDate->toDateString(),
            'guests'    => 2
        ]);

        dd($response);

        $this->seeInDatabase('bookings', [
            'user_id'   => $user->id,
            'room_id'   => $room->id,
            'check_in'  => $checkInDate->toDateTimeString(),
            'check_out' => $checkOutDate->toDateTimeString(),
            'guests'    => 2
        ]);
    }

    public function test_a_user_can_book_a_room_with_incorrect_minimum_stay()
    {
    	$user = factory(App\User::class)->create([]);
    	$room = factory(App\Room::class)->create([
            'minimum_stay'  => 3
        ]);

    	$this->actingAs($user);

        $checkIn = Carbon::now()->addDays(3)->toDateString();
        $checkOut = Carbon::now()->addDays(5)->toDateString();

        $this->call('POST', '/bookings/'.$room->id, [
            'roomId'    => $room->id,
            'checkIn'   => $checkIn,
            'checkOut' => $checkOut,
            'guests'   => 2
        ]);
        
        $this->assertRedirectedTo('/room/'.$room->slug);

    }

    public function test_do_not_allow_an_unauthenticated_user_to_book_a_room()
    {
    	$user = factory(App\User::class)->create([]);
    	$room = factory(App\Room::class)->create([]);

        $checkIn = Carbon::now()->addDays(3)->toDateString();
        $checkOut = Carbon::now()->addDays(5)->toDateString();

        $response = $this->call('POST', '/bookings/'.$room->id, [
            'roomId'    => $room->id,
            'checkIn'   => $checkIn,
            'checkOut' => $checkOut,
            'guests'    => 2
        ]);

        $this->assertRedirectedTo('/login');
    }
}
