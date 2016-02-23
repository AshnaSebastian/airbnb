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
            /**
             * Store 2 photos in each Country
             */
            $photos = factory(App\Photo::class, 2)->make([
                'imageable_id'  => $country->id,
                'imageable_type'    => 'App\Country'
            ]);
            $country->photos()->saveMany($photos);

            /**
             * Create a user for each country
             */
            $user = factory(App\User::class)->create([
                'country_id'    => $country->id
            ]);
            
            /**
             * Store these rooms on the $user
             */
            $roomData = factory(App\Room::class, 5)->make();
            $rooms = $user->rooms()->saveMany($roomData);

            foreach( $rooms as $room )
            {    	
                /**
                 * Store 7 photos on each room
                 */
    	        $photos = factory(App\Photo::class, 7)->make([
    	            'imageable_id'  => $room->id,
    	            'imageable_type'    => 'App\Room'
    	        ]);
    	        $room->photos()->saveMany($photos);
            }
        }
    }
}
