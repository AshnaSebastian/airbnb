<?php

namespace App\Http\Controllers;

use App\Amenity;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JavaScript;

class RoomsController extends Controller
{
    public function show($rooms)
    {    	    	
    	$room = $rooms;
    	$amenities = Amenity::all();

    	JavaScript::put([
    		'signedIn' => Auth::check() ? true : false,
    		'room' => $rooms
    	]);

    	return view('public.rooms.show', compact('room', 'amenities'));	
    }
}
