<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
	public function index()
	{
		$countries = Country::with('rooms')->get();
		return view('public.countries.index', compact('countries'));
	}

    public function rooms($country)
    {    	
    	$rooms = $country->rooms;
		return view('public.rooms.per-country', compact('rooms'));
    }
}
