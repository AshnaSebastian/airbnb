<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingsController extends Controller
{
    public function store(Request $request)
    {    	
    	$room = Room::findOrFail($request->roomId);

    	list($checkInMonth, $checkInDay, $checkInYear) = explode('/', $request->checkIn);
    	list($checkOutMonth, $checkOutDay, $checkOutYear) = explode('/', $request->checkOut);

    	$checkInDate = Carbon::createFromDate($checkInYear, $checkInMonth, $checkInDay);
    	$checkOutDate = Carbon::createFromDate($checkOutYear, $checkOutMonth, $checkOutDay);

    	$totalDaystoStay = $checkOutDate->diffInDays($checkInDate);

    	if( $totalDaystoStay < $room->minimum_stay )
    	{
    		return redirect()->route('room', $room->slug);
    	}

    	return Booking::create([
    		'user_id'	=> Auth::user()->id,
    		'room_id'	=> $room->id,
    		'check_in'	=> $checkInDate->toDateTimeString(),
    		'check_out'	=> $checkOutDate->toDateTimeString(),
            'guests'    => $request->guests
    	]);
    }
}
