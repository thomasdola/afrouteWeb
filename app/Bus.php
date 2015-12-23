<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = ['name'];

	public function bus_features()
	{
		return $this->belongsToMany('App\BusFeature');
	}

	public function bus_images()
	{
		return $this->hasMany('App\BusImage');
	}

	public function rental()
	{
		return $this->hasMany('App\Rental');
	}
}
