<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserRoomsTest extends TestCase
{
	use DatabaseMigrations;

    public function test_a_user_can_view_all_his_or_her_posted_rooms()
    {
    	$user = factory(App\User::class)->create();
    	$room = factory(App\Room::class)->create();
    	$user->rooms()->save($room);

    	$this->actingAs($user);

    	$this->visit('/user/'.$user->id.'/rooms')
    		->see($room->name);
    }

    public function test_a_user_can_create_a_room_record()
    {
    	$user = factory(App\User::class)->create();
    	$this->actingAs($user);
    	
    	$this->visit('/user/'.$user->id.'/rooms/create')
    		->see('Add New Room');
    }

    public function test_a_user_can_store_a_room_record()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user);

        $this->visit('/user/'.$user->id.'/rooms/create')
            ->type('Room Name', 'name')
            ->type('20', 'price')
            ->select('0', 'country')
            ->type('About this listing', 'aboutListing')
            ->select('Apartment', 'propertyType')
            ->select('Private Room', 'roomType')
            ->type('1', 'accommodates')
            ->type('2', 'bathrooms')
            ->type('Real Bed', 'bedType')
            ->type('3', 'bedrooms')
            ->type('4', 'beds')
            ->type('12:01 AM', 'checkIn')
            ->type('11:59 PM', 'checkOut')
            ->type('0', 'extraPeopleFee')
            ->type('5', 'cleaningFee')
            ->type('Room Description', 'description')
            ->select('2', 'minimumStay')
            ->press('Save Room Information')
            ->seeInDatabase('rooms', [
                'user_id'   => $user->id,
                'country_id'   => 1,
                'name' => 'Room Name',
                'slug'  => 'room-name',
                'price' => 20,
                'aboutListing' => 'About this listing',
                'propertyType'  => 'Apartment',
                'roomType'  => 'Private Room',
                'accommodates'  =>  1,
                'bathrooms' => 2,
                'bedType'   => 'Real Bed',
                'bedrooms'  => 3,
                'beds'  => 4,
                'checkIn'   => '12:01 AM',
                'checkOut'  => '11:59 PM',
                'extraPeopleFee'    => 0,
                'cleaningFee'   => 5,
                'description'   => 'Room Description',
                'minimumStay'   => 2
            ])
            ->seeInDatabase('photos', [
                'imageable_id'  => 1,
                'imageable_type'    => 'App\Room'
            ])
    }
}
