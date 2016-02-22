<?php

use App\Amenity;
use Illuminate\Database\Seeder;

class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amenities = [
        	'Kitchen',
        	'Internet',
        	'TV',
        	'Essentials',
        	'Shampoo',
        	'Heating',
        	'Air Conditioning',
        	'Washer',
        	'Dryer',
        	'Free Parking on Premises',
        	'Wireless Internet',
        	'Cable TV',
        	'Breakfast',
        	'Pets Allowed',
        	'Family/Kid Friendly',
        	'Suitable for Events',
        	'Smoking Allowed',
        	'Wheelchair Accessible',
        	'Elevator in Building',
        	'Indoor Fireplace',
        	'Buzzer/Wireless Intercom',
        	'Doorman',
        	'Pool',
        	'Hot Tub',
        	'Gym',
        	'24-Hour check-in',
        	'Hangers',
        	'Iron',
        	'Hair Dryer',
        	'Laptop Friendly Workspace'
        ];

        foreach( $amenities as $amenity )
        {
        	$record = new Amenity;
        	$record->name = $amenity;
        	$record->save();
        }
    }
}
