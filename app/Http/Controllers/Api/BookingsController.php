<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function getTotalStayDays($checkOut, $checkIn)
    {
    	list($checkInYear, $checkInMonth, $checkInDay) = explode('-', $checkIn);
    	list($checkOutYear, $checkOutMonth, $checkOutDay) = explode('-', $checkOut);

    	$checkInDate = Carbon::createFromDate($checkInYear, $checkInMonth, $checkInDay);
    	$checkOutDate = Carbon::createFromDate($checkOutYear, $checkOutMonth, $checkOutDay);

    	return $checkOutDate->diffInDays($checkInDate);
    }
}
