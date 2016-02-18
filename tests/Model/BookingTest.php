<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookingTest extends TestCase
{
	use DatabaseMigrations;

    public function test_it_gets_the_difference_between_checkout_and_checkin_dates()
    {
        $checkOut = '2016-02-20';
        $checkIn = '2016-02-18';

        $url = '/total-stay-days/'.$checkOut.'/'.$checkIn;
        $response = $this->call('GET', $url, []);        
        
        $this->assertEquals(2, $response->content());
    }
}
