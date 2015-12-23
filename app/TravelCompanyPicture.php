<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelCompanyPicture extends Model
{
    protected $fillable =
	    [
		    'path',
		    'travel_company_id',
	    ];

	public function travel_company()
	{
		return $this -> belongsTo('App\TravelCompany');
	}
}
