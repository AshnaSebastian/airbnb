<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
	protected $fillable = ['user_id', 'room_id'];
	
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
