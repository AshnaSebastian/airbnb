<?php

namespace App\Http\Controllers;

use App\Amenity;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Photo;
use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JavaScript;
use Laracasts\Flash\Flash;

class UserRoomsController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function index()
    {
    	$user = $this->user;
    	$rooms = $this->user->rooms;
    
    	return view('public.user.rooms.index', compact('user', 'rooms'));
    }

    public function create()
    {
        $amenities = Amenity::all();
        $countries = Country::all();

        JavaScript::put([
            'room'  => []
        ]);

    	return view('public.user.rooms.create', compact('amenities', 'countries'));
    }

    public function store(Request $request)
    {
        $newRoom = new Room([
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
        $room = $this->user->rooms()->save($newRoom);

        $photo = new Photo([
            'path'  => 'http://lorempixel.com/1400/720'
        ]);
        
        $room->photos()->save($photo);

        /**
         * Store room amenities
         */
        if( $request->has('amenities') )
        {        
            $amenities = collect($request->amenities)->all();
            $room->amenities()->attach($amenities);
        }

        Flash::success('Hurray! Your room has been successfully added.');
        return redirect()->route('room', $room->id);
    }

    public function show(Room $rooms)
    {        
        $room = $rooms;
        $user = $this->user;

        JavaScript::put([
            'signedIn' => Auth::check() ? true : false,
            'room' => $room
        ]);

        return view('public.user.rooms.show', compact('user', 'room'));
    }

    public function edit(Room $rooms)
    {
        $room = $rooms;
        $user = $this->user;
        $amenities = Amenity::all();

        JavaScript::put([
            'user'  => $user,
            'amenities' => $amenities,
            'room'  => $room
        ]);

        return view('public.user.rooms.edit', compact('user', 'room', 'amenities'));
    }

    public function update(Request $request, Room $room)
    {   
        $this->validate($request, [
            'name'  => 'required',
            'price' => 'required',
            'minimumStay' => 'required',
            'aboutListing' => 'required',
            'propertyType' => 'required',
            'roomType'  => 'required',
            'accommodates'  => 'required',
            'bathrooms' => 'required',
            'bedType'   => 'required',
            'bedrooms'  => 'required',
            'beds'  => 'required',
            'checkIn'   => 'required',
            'checkOut'  => 'required',
            'extraPeopleFee'    => 'required',
            'cleaningFee'   => 'required',
            'description'   => 'required'
        ]);

        if( $room->update($request->all()) )
        {
            return 'Yey! Your room has been successfully updated.';
        }

        return 'Ooops! Something is wrong. Please try again.';
    }
}









