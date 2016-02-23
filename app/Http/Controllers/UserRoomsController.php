<?php

namespace App\Http\Controllers;

use App\Amenity;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Photo;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use JavaScript;

class UserRoomsController extends Controller
{
    public function index()
    {
    	$user = Auth::user();
    	$rooms = Auth::user()->rooms;
    
    	return view('public.user.rooms.index', compact('user', 'rooms'));
    }

    public function create()
    {
        $amenities = Amenity::all();
        $countries = Country::all();
    	return view('public.user.rooms.create', compact('amenities', 'countries'));
    }

    public function store(Request $request)
    {
        $countryId = $request->country == 0 ? 1 : $request->country;

        $newRoom = new Room([
            'country_id'    => $countryId,
            'name' => $request->name,
            'price' => $request->price,
            'aboutListing' => '',
            'propertyType' => $request->propertyType,
            'roomType' => $request->roomType,
            'accommodates' => $request->accommodates,
            'bathrooms' => $request->bathrooms,
            'bedType' => $request->bedType,
            'bedrooms' => $request->bedrooms,
            'beds' => $request->beds,
            'checkIn' => $request->checkIn,
            'checkOut'  => $request->checkOut,
            'extraPeopleFee' => $request->extraPeopleFee,
            'cleaningFee' => $request->cleaningFee,
            'description' => '',
            'minimumStay' => $request->minimumStay                
        ]);

        /**
         * Store new room data
         */
        $room = Auth::user()->rooms()->save($newRoom);

        $photo = new Photo([
            'path'  => 'http://lorempixel.com/1400/720'
        ]);
        
        $room->photos()->save($photo);

        /**
         * Store room amenities
         */
        if( $request->has('amenities') )
        {        
            foreach( $request->amenities as $amenity )
            {
                $room->amenities()->attach($amenity);
            }
        }

        Flash::success('Hurray! Your room has been successfully added.');
        return redirect()->route('room', $room->id);
    }

    public function show($user, $rooms)
    {        
        $room = $rooms;

        JavaScript::put([
            'signedIn' => Auth::check() ? true : false,
            'room' => $room
        ]);

        return view('public.user.rooms.show', compact('user', 'room'));
    }

    public function edit($user, $rooms)
    {
        $room = $rooms;
        $amenities = Amenity::all();
        $countries = Country::all();
        return view('public.user.rooms.edit', compact('user', 'room', 'countries', 'amenities'));
    }
}









