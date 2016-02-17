<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoomTest extends TestCase
{
	use DatabaseMigrations;

    public function test_it_shows_all_the_rooms_per_country()
    {
    	$country = factory(App\Country::class)->create();

        $room = factory(App\Room::class)->create([
            'country_id'    => $country->id
        ]);

        $photos = factory(App\Photo::class, 5)->make([
            'imageable_id'  => $room->id,
            'imageable_type'    => 'App\Room'
        ]);

        $room->photos()->saveMany($photos);

        $roomFromOtherCountry = factory(App\Room::class)->create();

    	$this->visit('/country/'.$country->slug.'/rooms')
    		->see($room->name)
            ->dontSee($roomFromOtherCountry->name);
    }

    public function test_view_a_selected_room()
    {
        $room = factory(App\Room::class)->create();

        $this->visit('/room/'.$room->slug)
            ->see($room->name); 
    }
}
