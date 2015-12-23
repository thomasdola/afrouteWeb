<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Payment;
use App\Repositories\CashCardRepository;
use App\Review;
use App\Trip;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Vsmoraes\Pdf\Pdf;

class CustomersController extends Controller
{
	/**
	 * @var CashCardRepository
	 */
	private $cashCard;
	/**
	 * @var Pdf
	 */
	private $pdf;


	/**
	 * @param CashCardRepository $cashCard
	 * @param Pdf $pdf
	 */
	public function __construct(CashCardRepository $cashCard, Pdf $pdf)
	{

		$this->cashCard = $cashCard;
		$this->pdf = $pdf;
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function profile()
    {
	    $user = Auth::user()->get();
	    $total_traveled = Booking::whereraw('user_id = ? AND status = ?', [$user->id, 'paid'])->count();
	    return view('customers.profile', ['user'=>$user, 'total_traveled'=> $total_traveled]);
    }

	/**
	 * @return \Illuminate\View\View
	 */
	public function account()
	{
		return view('customers.profile_account');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function account_settings()
	{
		$user = Auth::user()->get();
		return view('customers.profile_settings', ['user'=>$user]);
	}

	/**
	 * @param Request $request
	 * @param $user
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function info_update(Request $request)
	{
		if($request->info_change)
		{
			$credentials = $request->except(['c_password', 'confirm_password', 'password']);
			$this->info_change($request);

		}elseif($request->pass_change)
		{
			$credentials = $request->only(['c_password', 'confirm_password', 'password']);
			$this->password_update($credentials);
		}
		return redirect()->route('customer_settings');
	}

	/**
	 * @param $credentials
	 *
	 * @internal param Request $request
	 * @internal param $user
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	private function password_update($credentials)
	{
		$user = Auth::user()->get();
		$current_password = $credentials['c_password'];

		if(! $this->his_password($current_password))
		{
			session()->flash('error_msg', 'No Match, Please Try again...');
			return redirect()->route('customer_settings');
		}

		if($credentials['confirm_password'] != $credentials['password'])
		{
			return redirect()->back()->withErrors('Passwords do not match');
		}

		$credential = $credentials['password'];

		$user -> update($credential);
		session()->flash('success_msg', 'Password Updated Successfully');
		return redirect()->route('customer_settings');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function booking_history()
	{
		$user = Auth::user()->get();
		$bookings = Booking::where('user_id', $user->id)->get();
//        dd($bookings);
		return view('customers.profile_booking_history', ['bookings' => $bookings]);
	}

	/**
	 * @param $current_password
	 *
	 * @return bool
	 */
	private function his_password($current_password)
	{
		$user = User::where('password', $current_password)->first();
		if($user)
		{
			dd('true');
			return true;
		}else
		{
			dd('false');
			return false;
		}

	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function cancel_paid_booking(Request $request)
	{
		$id = $request->booking_id;
		$booking = Booking::find($id);
		$booking->status = 'canceled';
		$booking->save();
		return redirect()->route('customer_booking_history');
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function pay_reserve_booking_form($code)
	{

		$booking = Booking::where('code', $code)->first();


		if($booking)
		{
			if($booking->user_id == Auth::user()->get()->id)
			{
				return view('customers.paynow')->withId($booking -> id);
			}else
			{
				return redirect()->route('customer_profile');
			}
		}else
		{
			return redirect()->route('customer_profile');
		}

	}

	/**
	 * @param Request $request
	 *
	 * @return $this|\Illuminate\View\View
	 */
	public function pay_reserve_booking_now(Request $request)
	{
		$booking = Booking::find($request->booking_id);
		$trip = Trip::find($booking->trip_id);
		$trip_id = $trip->id;
		$passengers = 1;
		$travel_company_id = $trip->travel_company_id;

		if($request->has('cashcard_code'))
		{
			$code = strtoupper($request->cashcard_code);
			if($this->cashCard->checkIfCashCardCodeIsValid($code, $trip->id, $passengers))
			{
				$status = "paid";
				$booking->status = $status;
				$booking->ticket_number = rand().time();
				$booking->save();

				Payment::create([
					'trip_id'=>$booking->trip->id,
					'amount'=>$booking->trip->fare,
					'user_id'=>Auth::user()->get()->id,
					'booking_id'=>$booking->id,
					'travel_company_id'=>$travel_company_id
				]);

				$user = Auth::user()->get();
//				$mail = view('mails.ticket')->render();
				Session::put('r_b_c_data', $booking);
				Session::put('r_b_c_passengers', $passengers);
				Session::put('r_b_c_trip_id', $trip_id);
//				Mail::send('mails.new', ['user' => $user], function ($m) use ($user) {
//		            $m->to($user->email, $user->name)->subject('Passenger name booking detail');
//		        });
				return redirect()->route('reserved-trip-paid');
			}else
			{
				return redirect()
					->back()
					->withErrors('There was a problem processing the payment');
			}
		}elseif($request->has('speedBanking_code')) {
			$code = $request->speed_banking_code;
			if ($this->cashCard->checkIfCashCardCodeIsValid($code, $trip->id, $passengers)) {
				dd('paying speedBanking');
				$status = "paid";
//				$this->insert($passengers, $request->all(), $user_id, $trip_id, $status);
				return view('payment.success');
			} else {
				return redirect()->back()->withErrors('There was a problem processing the payment');
			}
		}
	}


	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function put_booking_in_trash(Request $request)
	{
		if($request->has('booking_id')) {
			$booking = Booking::find($request->booking_id);
			$booking->delete();

			return redirect()->route('customer_booking_history');
		}else
		{
			return redirect()->route('customer_booking_history');
		}
	}

	public function password_change(Request $request)
	{
		$input = $request->all();
		$user = Auth::user()->get();

		$this->validate($request,
			[
				'password' => "confirmed|min:8"
			]);

		$input = $request->except('password_confirmation');

//		dd($input, $user);

		$user->update($input);

        session()->flash('info', 'Password has been changed');

		return redirect()->route('customer_settings');

	}

	private function info_change($request)
	{
		$user = Auth::user()->get();
		$this->validate($request,
			[
				'email'=>'email',
			]);
		$input = $request->except(['info_change']);
		$user -> update($input);
	}

	public function ticketing($code)
	{
		$booking = Booking::where('code', $code)->first();
		$html = view('mails.print', ['booking'=>$booking])->render();
		return $this -> pdf -> load($html)->download();
	}

}
