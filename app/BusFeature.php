<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusFeature extends Model
{
    protected $fillable = ['name', 'icon'];

	public function buses()
	{
		return $this->belongsToMany('App\Bus');
	}

	public function travel_companies()
	{
		return $this->belongsToMany('App\TravelCompany');
	}
}
