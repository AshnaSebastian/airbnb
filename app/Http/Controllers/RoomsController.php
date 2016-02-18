<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use JavaScript;

class RoomsController extends Controller
{
    public function show($room)
    {
    	JavaScript::put([
    		'room' => $room
    	]);

    	return view('public.rooms.show', compact('room'));	
    }
}
