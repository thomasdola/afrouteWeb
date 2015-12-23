<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{

	use SoftDeletes;
    protected $fillable =
	    [
		    'passenger_name',
		    'passenger_sex',
		    'passenger_id_type',
		    'passenger_id_number',
		    'passenger_id_exp_date',
		    'passenger_dob',
		    'passenger_citizenship',
//		    'passenger_reporting_time',
		    'trip_id',
		    'user_id',
		    'travel_company_id',
		    'code',
		    'status',
		    'deleted_at',
	    ];

	protected $dates = ['deleted_at'];

	public function trip()
	{
		return $this->belongsTo('App\Trip');
	}


	public function user()
	{
		return $this -> belongsTo('App\User');
	}

	public function payments()
	{
		return $this->hasMany('App\Payment');
	}

}
