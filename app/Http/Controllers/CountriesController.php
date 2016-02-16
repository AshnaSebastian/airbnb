<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CountriesController extends Controller
{
    public function rooms($country)
    {
    	$rooms = $country->rooms;
		return view('public.rooms.per-country', compact('rooms'));
    }

    public function roomsTesting()
    {
		return view('public.rooms.per-country');
    }
}
