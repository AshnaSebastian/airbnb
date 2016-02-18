<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountryTest extends TestCase
{
	use DatabaseMigrations;
	
    public function test_is_shows_all_the_countries()
    {
    	$country = factory(App\Country::class)->create();

    	$this->visit('/countries')
    		->see($country->name);
    }
}
