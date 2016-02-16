<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
	protected $fillable = ['user_id', 'room_id', 'check_in', 'check_out'];
	
	protected $dates = ['check_in', 'check_out'];
	
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
