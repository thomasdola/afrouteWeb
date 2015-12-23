<?php

namespace App\Http\Controllers;

use App\Booking;
use App\CashCode;
use App\Payment;
use App\Repositories\CashCardRepository;
use App\Repositories\TimeRepository;
use App\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BookingsController extends Controller
{

	/**
	 * @var TimeRepository
	 */
	private $time;
	/**
	 * @var CashCardRepository
	 */
	private $cashCard;

	/**
	 * @param TimeRepository $time
	 * @param CashCardRepository $cashCard
	 */
	public function __construct(TimeRepository $time, CashCardRepository $cashCard)
	{

		$this->time = $time;
		$this->cashCard = $cashCard;
	}


	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
	 */
	public function first(Request $request, $id)
	{
		$passengers = $request -> passengers;

		$trip = $this -> checkIfTripIsAvailable($id);

		if(!$trip)
		{
			session()->flash('error_msg', 'NO Match');
			return redirect()->back();
		}

		Session::put('passengers', $passengers);
		Session::put('trip_id', $id);
		return view('payment.registered', ['passengers'=>$passengers, 'trip'=>$trip]);
	}



	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\View\View
	 */
	public function second(Request $request)
	{
		$passengers = Session::get('passengers');
		$trip_id = Session::get('trip_id');
		$trip = Trip::find($trip_id);
		$user_id = Auth::user()->get()->id;


//		if(!$this->checkIfReportingTimeIsValid($passengers, $request->except(['cash_card', 'speed_banking', 'reserve', 'cash_card_code', 'speed_banking_code']), $trip_id))
//		{
//			return redirect()->back()
//				->withErrors("Your Reporting Time should be {$trip->departure_time} time")
//				->withInput();
//		}


		$ticketData = $request->except(['cash_card', 'speed_banking', 'reserve', 'cash_card_code', 'speed_banking_code']);
		Session::put('data', $ticketData);
		if($request->has('cash_card'))
		{

			$code = strtoupper($request->cash_card_code);
			if($this->cashCard->checkIfCashCardCodeIsValid($code, $trip_id, $passengers))
			{
				$status = "paid";
				$number = true;
				$paid = true;
				$input = $this->insertIntoDatabase($passengers, $request->all(), $user_id, $trip_id, $status, $number, $paid);
				Session::put('b_c_data', $ticketData);
				Session::put('b_c_passengers', $passengers);
				Session::put('b_c_trip_id', $trip_id);
				Session::put('b_c_input', $input);
				return redirect()->route('success');
			}else
			{
				return redirect()->back()->withErrors('There was a problem processing the payment')->withInput();
			}
		}elseif($request->has('speed_banking'))
		{
			$code = strtoupper($request->speed_banking_code);
			if($this->cashCard->checkIfCashCardCodeIsValid($code, $trip_id, $passengers))
			{
				dd('paying speedBanking');
				$status = "paid";
				$number = true;
				$paid = true;
				$input = $this->insertIntoDatabase($passengers, $request->all(), $user_id, $trip_id, $status, $number, $paid);
				Session::put('b_s_data', $ticketData);
				Session::put('b_s_passengers', $passengers);
				Session::put('b_s_trip_id', $trip_id);
				return redirect()->route('success');
			}else
			{
				return redirect()->back()->withErrors('There was a problem processing the payment')->withInput();
			}
		}else
		{
			$number = false;
			$paid = false;
			$status = 'reserved';
			$this->insertIntoDatabase($passengers, $request->all(), $user_id, $trip_id, $status, $number, $paid);
			Session::put('r_data', $ticketData);
			Session::put('r_passengers', $passengers);
			Session::put('r_trip_id', $trip_id);
//			dd($data);
			return redirect()->route('trip-reserved');
		}

	}


	/**
	 * @param $booking
	 */
	public function change_status($booking)
	{
//		$booking->update();
	}











	/*
    |--------------------------------------------------------------------------
    | Few Helper Functions
    |--------------------------------------------------------------------------
    */


	/**
	 * @param $passengers
	 * @param $request
	 * @param $user_id
	 * @param $trip_id
	 * @param string $status
	 * @param bool|string $number
	 *
	 * @param bool $paid
	 *
	 * @return \App\Booking
	 */
	private function insertIntoDatabase($passengers, $request, $user_id, $trip_id, $status="reserved", $number=false, $paid=false)
	{
		$travel_company_id = Trip::find($trip_id)->travel_company->id;

		$orNum = $number;

		$input = [];

		for($i = 1; $i <= $passengers; $i++)
		{

			$number = $orNum == false ? null : $this->number();

			$credentials = array_where($request, function($k) use($i)
			{
				return ends_with($k, "_{$i}");
			});

			$booking = new Booking();
			$input["passenger_name_{$i}"] = $booking -> passenger_name = $credentials["passenger_name_{$i}"];
			$input["passenger_sex_{$i}"] = $booking -> passenger_sex = $credentials["passenger_sex_{$i}"];
			$input["passenger_id_type_{$i}"] = $booking -> passenger_id_type = $credentials["passenger_id_type_{$i}"];
			$input["passenger_id_number_{$i}"] = $booking -> passenger_id_number = $credentials["passenger_id_number_{$i}"];
			$input["passenger_id_exp_date_{$i}"] = $booking -> passenger_id_exp_date = $credentials["passenger_id_exp_date_{$i}"];
			$input["passenger_dob_{$i}"] = $booking -> passenger_dob = $this->time->carbonize($credentials["passenger_dob_{$i}"]);
			$input["passenger_citizenship_{$i}"] = $booking -> passenger_citizenship = $credentials["passenger_citizenship_{$i}"];
//			$input["passenger_reporting_time_{$i}"] = $booking -> passenger_reporting_time = $credentials["passenger_reporting_time_{$i}"];
			$input["passenger_user_id_{$i}"] = $booking -> user_id = $user_id;
			$input["passenger_trip_id_{$i}"] = $booking -> trip_id = $trip_id;
			$input["passenger_code_{$i}"] = $booking -> code = $this->code();
			$booking -> status = $status;
			$input["passenger_ticket_number_{$i}"] = $booking -> ticket_number = $number;
			$input["passenger_travel_company_id_{$i}"] = $booking -> travel_company_id = $travel_company_id;
			$booking -> save();
			if($paid == true){$this->make_payment($booking, $travel_company_id);}
		}

		return $input;
	}


	/**
	 * @param $passengers
	 * @param $request
	 * @param $trip_id
	 *
	 * @return bool
	 */
	private function checkIfReportingTimeIsValid($passengers, $request, $trip_id)
	{
		$trip = Trip::find($trip_id);
		$trip_time = $trip->departure_time;
		$trip_date = $trip->departure_date;
		$time_frame = $this->time->getTimeFrame($trip_time, $trip_date);

		for($i = 1; $i <= $passengers; $i++)
		{
			$credentials = array_where($request, function ($k) use ($i) {
				return ends_with($k, "_{$i}");
			});

			$reporting_time = $credentials["passenger_reporting_time_{$i}"];

			return $this->time->isTimeCorrect($reporting_time, $time_frame, $trip_id) ? true : false;
		}
	}


	/**
	 * @param $trip_id
	 *
	 * @return mixed
	 */
	private function checkIfTripIsAvailable($trip_id)
	{
		$trip = Trip::find($trip_id);
		return $trip;
	}


	/**
	 * @return string
	 */
	private function code()
	{
		$characters = array(
			"1","2","3","4","5","6","7","8","9","A","B","C","D","E","F","G","H","I","K","L","M","N","O","Q","R","S","T","U","V","W","Y","Z"
					);

		$keys = array();

		while(count($keys) < 11){
			$x = mt_rand(0, count($characters) - 1);
			if(!in_array($x, $keys)){
				$keys[]= $x;
			}
		}
		$random_chars ="";
		foreach($keys as $key){

			$random_chars .= $characters[$key];
		}

		return $random_chars;
	}

	/**
	 * @param $booking
	 * @param $travel_company_id
	 */
	private function make_payment($booking, $travel_company_id)
	{
		Payment::create(
			[
				'trip_id'=>$booking->trip->id,
				'amount'=>$booking->trip->fare,
				'user_id'=>Auth::user()->get()->id,
				'booking_id'=>$booking->id,
				'travel_company_id'=>$travel_company_id
			]);
	}

//	public function ticketing()
//	{
//		$html = view('mails.ticket', ['name'=>$name])->render();
//		return $this->pdf->load($html)->download();
//	}

	private function number()
	{
		return rand(Carbon::now()->timestamp, Carbon::maxValue()->timestamp);
	}


}
