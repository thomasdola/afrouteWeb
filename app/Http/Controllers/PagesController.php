<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Bus;
use App\CashCode;
use App\Outlet;
use App\Repositories\TimeRepository;
use App\Station;
use App\TravelCompany;
use App\Trip;
//use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Vsmoraes\Pdf\Pdf;


class PagesController extends Controller
{

	/**
	 * @var TimeRepository
	 */
	private $time;
	/**
	 * @var PDF
	 */
	private $pdf;


	/**
	 * @param TimeRepository $time
	 * @param PDF $pdf
	 */
	public function __construct(TimeRepository $time, Pdf $pdf)
	{
		$this->middleware('user-auth', ['only'=>'receipt']);
		$this->time = $time;

		$this->pdf = $pdf;
	}


	/**
	 * @return mixed
	 */
	public function ticketDownload(){
		$name = 'thomas';
		$html = view('mails.report', ['name'=>$name])->render();
		return $this->pdf->load($html)->download();
//		return view('mails.report');
	}

	public function soon(){
		return view('pages.newSoon');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function welcome()
	{
//		$collection = array();
//		for($i = 1; $i < 10; $i++){
//			$ukey = strtoupper(substr(sha1(microtime() . $i), rand(0, 5), 25));
//			if(!in_array($ukey, $collection)){ // you can check this in database as well.
//				$collection[] = implode("-", str_split($ukey, 5));
//			}
//		}
//		dd($collection);


		$trips = Trip::where('departure_date', Carbon::tomorrow())->take(3)->get();

//		dd($trips->isEmpty());

		return view('pages.welcome', ['trips_to_display'=>$trips]);
	}


	public function rentBus($id)
	{
		$bus = Bus::find($id);
		$features = $bus->bus_features;
//		dd($features);
		return view('pages.rent_bus', ['bus'=>$bus, 'features'=>$features]);
	}

	public function allBuses()
	{
		$buses = Bus::all();
		return view('pages.all_buses', ['buses'=> $buses]);
	}


	/**
	 * @return \Illuminate\View\View
	 */
	public function all_trips()
    {
	    $allTrips = Trip::all();
		$travel_companies = TravelCompany::all();
	    return view('pages.all_trips', ['trips'=>$allTrips, 'travel_companies'=>$travel_companies]);
    }


	/**
	 * @return \Illuminate\View\View
	 */
	public function about_us()
	{
		return view('pages.about');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function all_stations()
	{
		$stations = Station::all();
		return view('pages.all_stations', ['stations'=> $stations]);
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function posts()
	{
		return view('pages.all_posts');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function post()
	{
		return view('pages.post');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function contact_us()
	{
		return view('pages.contact_us');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function terms()
	{
		return view('pages.terms');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function policy()
	{
		return view('pages.policy');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function faq()
	{
		return view('pages.faq');
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function sendFeedback(Request $request)
	{
		$this->validate($request, ['name'=>'min:10', 'email'=>'email', 'message'=>'min:10']);
//		dd($request->all());
		try
		{
			Mail::raw($request->message, function($message) use ($request)
            {
                $message->from($request->email, 'feedback contact form');
                $message->to('support@afroute.com')->subject('feedback form contact');
            });
		}catch (\ErrorException $e)
		{
			return redirect()->route('contact_us')->withErrors('Sorry, Try again later');
		}

		session()->flash('info', 'Your message has been sent. Thank You!');
		return redirect()->route('contact_us');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function check_result(Request $request)
	{
		$this->validate($request,
			[
				'code'=>'required',
				'checkType'=>'required',
			]);


		if($request->checkType == 'ticket')
		{
			$code = $request->code;
			$code_type = "booking_ticket";
			$ticket = Booking::where('code', $code)->first();
			if($ticket)
			{
//				dd($ticket->user);
				return view('pages.check_result',
					[
						'code_type'=>$code_type,
						'ticket'=>$ticket,
					]);
			}else
			{
//				dd($ticket);
				return view('pages.check_result',
					[
						'code_type'=>$code_type,
						'ticket'=>$ticket,
					])->withErrors('No Ticket Found');
			}
			dd('this is a ticket code');
		}else
		{
			$code_type = "cash_card";
			$code = $request->code;
			$cashCard = CashCode::where('code',$code)->first();
			if($cashCard)
			{
//				dd($code_type);
				return view('pages.check_result',
					[
						'code_type'=>$code_type,
						'card'=>$cashCard,
					]);
			}else
			{
//				dd($cashCard);
				return view('pages.check_result',
					[
						'code_type'=>$code_type,
						'card'=>$cashCard,
					])->withErrors('No Card Found');
			}
		}
	}

	/**
	 * @param Request $request
	 *
	 * @return $this
	 */
	public function search(Request $request)
	{
		$this->validate($request,
			[
				'departure_station'=>'required|different:destination_station',
				'destination_station'=>'required',
				'start'=>'required',
			]);

		$travel_companies = TravelCompany::all();

		$to = $request->destination_station;
		$from = $request -> departure_station;
		$departure_date = Carbon::parse($request->start);
		$dd_start = Carbon::parse($request->start)->startOfDay();
		$dd_end = Carbon::parse($request->start)->endOfDay();
//		$trips = Trip::all();

//		dd($request->all(), $trips);

		if($departure_date -> lt( Carbon::today()))
		{
			return redirect()->back()->withErrors('Invalid Date');
		}else
		{
			if($departure_date -> eq(Carbon::today()) )
			{
				$trips = $this->getTodayOneWayTrips($from, $to);
//				dd($trips);
			}
			else
			{
//				$trips = Trip::whereraw('departure_date = ? AND departure_station = ? AND destination_station = ?',
//					[$departure_date, $from, $to])->get();
				$trips = Trip::whereraw('departure_station = ? AND destination_station = ?', [$from, $to])
											->whereBetween('departure_date', [$dd_start, $dd_end])
											->get();
			}
		}

		return view('pages.all_trips', ['travel_companies'=> $travel_companies , 'from'=>$from, 'to'=>$to, 'start'=>$departure_date])->with('trips', $trips);

	}



	/**
	 * @return \Illuminate\View\View
	 */
	public function receipt()
	{
		return view('pages.receipt');
	}


	public function cvp()
	{
		$vp = Outlet::all();
//		dd($vp);
		return view('pages.outlets')->with('outlets', $vp);
	}


	/**
	 * @param $from
	 * @param $to
	 *
	 * @return array
	 */
	private function getTodayReturningTrips($from, $to)
	{
		if($this->time->currentTimeFrame() == 'Morning')
		{
			$trips = Trip::whereraw('departure_date = ? AND returning_date = ? AND departure_station = ? AND destination_station = ?',
				[Carbon::today(), Carbon::today(), $from, $to])
				->whereIn('departure_time', ['Afternoon', 'Evening'])
				->get();
		}
		elseif($this->time->currentTimeFrame() == 'Afternoon')
		{
			$trips = Trip::whereraw('departure_date = ? AND returning_date = ? AND departure_station = ? AND destination_station = ?',
				[Carbon::today(), Carbon::today(), $from, $to])
				->where('departure_time', 'Evening')
				->get();
		}
		else
		{
			$trips = [];
		}
		return $trips;
	}


	/**
	 * @param $from
	 * @param $to
	 *
	 * @return array
	 */
	private function getTodayOneWayTrips($from, $to)
	{
//		dd($this->time->currentTimeFrame());
		if($this->time->currentTimeFrame() == "Morning")
	    {
		    $trips = Trip::whereraw('departure_date = ? AND departure_station = ? AND destination_station = ?',
			    [Carbon::today(), $from, $to])
			    ->whereIn('departure_time', ['Afternoon', 'Evening'])
			    ->get();
	    }
	    elseif($this->time->currentTimeFrame() == "Afternoon" OR $this->time->currentTimeFrame() == "Evening")
	    {
//		    $trips = Trip::whereraw('departure_date = ? AND departure_station = ? AND destination_station = ?',
//			    [Carbon::today(), $from, $to])
//			    ->where('departure_time', 'Evening')
//			    ->get();
		    $trips = [];
	    }else
	    {
		    $trips = [];
	    }

		return $trips;
	}


}
