<?php

namespace App\Http\Controllers;

use App\Trip;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PaymentsController extends Controller
{
    public function registered()
    {
	    return view('payment.registered');
    }

	public function unregistered()
	{
		return view('payment.unregistered');
	}

	public function reservation_paid()
	{
		if( ! Session::has('r_b_c_trip_id','r_b_c_passengers', 'r_b_c_data'))
		{
			return redirect()->route('welcome');
		}

		$trip = Trip::find(Session::get('r_b_c_trip_id'));
		$passengers = Session::get('r_b_c_passengers');
		$data = Session::get('r_b_c_data');
//		dd($data);
		return view('payment.reserved-paid',
			[
				'passengers'=>$passengers,
				'trip'=>$trip,
				'data'=>$data,
			]);

	}

	public function success()
	{
		if(Session::has('b_c_trip_id','b_c_passengers', 'b_c_data'))
		{
			$trip = Trip::find(Session::get('b_c_trip_id'));
			$passengers = Session::get('b_c_passengers');
			$data = Session::get('b_c_data');
			$input = Session::get('b_c_input');
			return view('payment.success',
				[
					'passengers'=>$passengers,
					'trip'=>$trip,
					'data'=>$input,
				]);
		}elseif(Session::has('b_s_trip_id','b_s_passengers', 'b_s_data'))
		{
			$trip = Trip::find(Session::get('b_s_trip_id'));
			$passengers = Session::get('b_s_passengers');
			$data = Session::get('b_s_data');
			$input = Session::get('b_c_input');
			return view('payment.success',
				[
					'passengers'=>$passengers,
					'trip'=>$trip,
					'data'=>$input,
				]);
		}

		return redirect()->route('welcome');

	}

	public function reservation()
	{
		if( ! Session::has('r_trip_id','r_passengers', 'r_data'))
		{
			return redirect()->route('welcome');
		}
		$trip = Trip::find(Session::get('r_trip_id'));
		$passengers = Session::get('r_passengers');
		$data = Session::get('r_data');
		return view('payment.reserved_page',
			[
				'passengers'=>$passengers,
				'trip'=>$trip,
				'data'=>$data,
			]);
	}
}
