<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'user_id', 
        'name', 
        'slug', 
        'price',
        'aboutListing',
        'propertyType',
        'roomType',
        'accommodates',
        'bathrooms',
        'bedType',
        'bedrooms',
        'beds',
        'checkIn',
        'checkOut',
        'extraPeopleFee',
        'cleaningFee',
        'description',
        'minimumStay'
    ];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = str_slug($name);
    }

    public function photos()
    {
    	return $this->morphMany(Photo::class, 'imageable');
    }
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'room_amenities');
    }
}
