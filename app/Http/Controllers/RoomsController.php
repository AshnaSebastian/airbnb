<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{
    public function show($room)
    {
    	return view('public.rooms.show', compact('room'));	
    }
}
