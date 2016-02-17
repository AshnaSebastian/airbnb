<?php

use Illuminate\Database\Seeder;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Country::class)->create();
        
        $rooms = factory(App\Room::class, 10)->create([
            'country_id'    => 1
        ]);

        foreach( $rooms as $room )
        {    	
	        $photos = factory(App\Photo::class, 15)->make([
	            'imageable_id'  => $room->id,
	            'imageable_type'    => 'App\Room'
	        ]);

	        $room->photos()->saveMany($photos);
        }
    }
}
