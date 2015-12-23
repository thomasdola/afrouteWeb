<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $fillable = [
		'body',
		'user_id',
		'travel_company_id'
	];

	public function travel_company()
	{
		return $this->belongsTo('App\TravelCompany');
	}


	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
