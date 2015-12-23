<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = ['departing_address', 'destination_address', 'departing_date', 'returning_date', 'customer_name', 'customer_email',
                'customer_phone_number', 'returning_time', 'departing_time', 'number_of_bus', 'bus_id', 'trip_type'];

	public function bus()
	{
		return $this->belongsTo('App\Bus');
	}
}
