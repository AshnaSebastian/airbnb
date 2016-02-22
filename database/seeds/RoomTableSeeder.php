<?php

use App\Country;
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
        $countries = Country::all();
        
        foreach( $countries as $country )
        {        
            $photos = factory(App\Photo::class, 5)->make([
                'imageable_id'  => $country->id,
                'imageable_type'    => 'App\Country'
            ]);

            $country->photos()->saveMany($photos);

            $user = factory(App\User::class)->create();
            
            $rooms = factory(App\Room::class, 10)->create([
                'user_id'   => $user->id,
                'country_id'    => $country->id
            ]);

            foreach( $rooms as $room )
            {    	
    	        $photos = factory(App\Photo::class, 10)->make([
    	            'imageable_id'  => $room->id,
    	            'imageable_type'    => 'App\Room'
    	        ]);

    	        $room->photos()->saveMany($photos);
            }
        }
    }
}
