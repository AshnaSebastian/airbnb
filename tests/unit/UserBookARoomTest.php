<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserBookARoomTest extends TestCase
{
	use DatabaseMigrations;

    public function test_a_user_can_book_a_room()
    {
    	$user = factory(App\User::class)->create([]);
    	$room = factory(App\Room::class)->create([]);

    	$this->actingAs($user);

    	$this->visit('/room/'.$room->slug)
    		->see($room->name)
    		->see($room->price)
    		->press('Book Now')
			->seeInDatabase('bookings', [
				'user_id'	=> $user->id,
				'room_id'	=> $room->id
			]);
    }

    public function test_do_not_allow_an_unauthenticated_user_to_book_a_room()
    {
    	$user = factory(App\User::class)->create([]);
    	$room = factory(App\Room::class)->create([]);

    	$this->visit('/room/'.$room->slug)
    		->see($room->name)
    		->see($room->price)
    		->press('Book Now')
    		->seePageIs('/login');
    }
}
