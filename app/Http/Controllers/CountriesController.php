<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use JavaScript;

class CountriesController extends Controller
{
	public function index()
	{
		$countries = Country::with('rooms.user', 'rooms.photos', 'photos')->get();
	
		JavaScript::put([
			'countries'	=> $countries
		]);

		return view('public.countries.index');
	}

    public function rooms($country)
    {    	
    	$rooms = $country->rooms;
		
		JavaScript::put([
			'country'	=> $country,
			'rooms'	=> $rooms
		]);

		return view('public.rooms.per-country');
    }
}
