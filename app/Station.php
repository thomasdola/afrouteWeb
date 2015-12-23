<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable =
	    [
			'country',
			'region',
			'city',
			'location',
			'travel_company_id',
	    ];

	public function travel_company()
	{
		return $this -> belongsTo('App\TravelCompany');
	}
}
