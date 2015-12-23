<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelCompany extends Model
{

	protected $table = 'travel_companies';


	protected $hidden = ['password', 'remember_token'];


    protected $fillable =
	    [
		    'name',
		    'email',
		    'phone',
		    'description',
		    'bus_features',
		    'country',
		    'region',
		    'city',
		    'location_url',
		    'address',
		    'facebook_link',
		    'password',
		    'slug',
	    ];


	public function trips()
	{
		return $this -> hasMany('App\Trip');
	}


	public function travel_company_staffs()
	{
		return $this -> hasMany('App\TravelCompanyStaff');
	}


	public function travel_company_picture()
	{
		return $this -> hasMany('App\TravelCompanyPicture');
	}

	public function payments()
	{
		return $this->hasMany('App\Payment');
	}

	public function travel_company_logo()
	{
		return $this->hasOne('App\Logo');
	}


	public function stations()
	{
		return $this -> hasMany('App\Station');
	}


	public function reviews()
	{
		return $this->hasMany('App\Review');
	}

	public function bus_features()
	{
		return $this->belongsToMany('App\BusFeature');
	}
}
