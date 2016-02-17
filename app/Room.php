<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['country_id', 'name', 'slug', 'price'];

    public function photos()
    {
    	return $this->morphMany(Photo::class, 'imageable');
    }
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
    public function country()
    {
    	return $this->belongsTo(Country::class);
    }
}
