<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable =
	    [
		    'booking_id',
		    'user_id',
		    'travel_company_id',
		    'amount',
		    'trip_id',
	    ];

	public function booking()
	{
		return $this->belongsTo('App\Booking');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function travel_company()
	{
		return $this->belongsTo('App\TravelCompany');
	}

	public function trip()
	{
		return $this->belongsTo('App\Trip');
	}
}
