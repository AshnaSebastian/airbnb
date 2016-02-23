<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountryTest extends TestCase
{
	use DatabaseMigrations;
	
    public function test_is_shows_all_the_countries()
    {
    	$user = factory(App\User::class)->create();
    	$roomData = factory(App\Room::class)->make();

    	$room = $user->rooms()->save($roomData);

    	$this->visit('/countries')
    		->see($room->name);
    }
}
