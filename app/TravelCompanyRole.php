<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelCompanyRole extends Model
{
    protected $fillable = [
	    'name',
    ];

	public function travel_companies()
	{
		return $this -> hasMany('App\TravelCompany');
	}


	public function travel_company_staff()
	{
		return $this -> hasMany('App\TravelCompanyStaff');
	}
}
