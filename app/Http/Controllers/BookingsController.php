<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingsController extends Controller
{
    public function store(Request $request)
    {
    	return Booking::create([
    		'user_id'	=> Auth::user()->id,
    		'room_id'	=> $request->roomId
    	]);
    }
}
