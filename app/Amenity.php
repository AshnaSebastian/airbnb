<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $fillable = ['name'];

    public function room()
    {
    	return $this->belongsToMany(Room::class, 'room_amenities');
    }
}
