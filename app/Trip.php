<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
{

	use SoftDeletes;

    protected $fillable =
	    [
		    'departure_station',
		    'stops',
		    'destination_station',
		    'trip_type',
		    'departure_date',
		    'departure_time',
		    'duration',
		    'code',
		    'boarding_point',
		    'travel_company_id',
		    'transport_model',
		    'fare',
		    'number_of_seats',
		    'deleted_at'
	    ];

	protected $dates = ['deleted_at', 'departure_date'];

	public function travel_company()
	{
		return $this -> belongsTo('App\TravelCompany');
	}

	public function bookings()
	{
		return $this -> hasMany('App\Booking');
	}

	public function payments()
	{
		return $this->hasMany('App\Payment');
	}

	public function setDepartureDateAttribute($date)
	{
		$this->attributes['departure_date'] = Carbon::parse($date);
	}

	public function code()
	{
		$characters = array(
			"1","2","3","4","5","6","7","8","9","A","B","C","D","E","F","G","H","I","K","L","M","N","O","Q","R","S","T","U","V","W","Y","Z"
					);

		$keys = array();

		while(count($keys) < 11){
			$x = mt_rand(0, count($characters) - 1);
			if(!in_array($x, $keys)){
				$keys[]= $x;
			}
		}
		$random_chars ="";
		foreach($keys as $key){

			$random_chars .= $characters[$key];
		}

		return $random_chars;
	}

}
