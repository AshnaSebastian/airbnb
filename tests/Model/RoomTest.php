<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoomTest extends TestCase
{
	use DatabaseMigrations;

    public function test_it_shows_all_the_rooms_per_country()
    {
        $user = factory(App\User::class)->create();        
        $roomData = factory(App\Room::class)->make();
        
        $room = $user->rooms()->save($roomData);

        $photos = factory(App\Photo::class, 5)->make([
            'imageable_id'  => $room->id,
            'imageable_type'    => 'App\Room'
        ]);

        $room->photos()->saveMany($photos);

        $OtherUser = factory(App\User::class)->create();
        $otherRoomData = factory(App\Room::class)->make();

        $otherRoom = $OtherUser->rooms()->save($otherRoomData);

    	$this->visit('/country/'.$user->country->slug.'/rooms')
    		->see($room->name)
            ->dontSee($otherRoom->name);
    }

    public function test_view_a_selected_room()
    {
        $user = factory(App\User::class)->create();
        $room = factory(App\Room::class)->make();

        $room = $user->rooms()->save($room);

        $this->visit('/room/'.$room->id)
            ->see($room->name); 
    }
}
