<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Logo;
use App\Review;
use App\Station;
use App\TravelCompany;
use App\TravelCompanyPicture;
use App\TravelCompanyStaff;
use App\Trip;
use App\BusFeature;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{


	/**
	 * @return \Illuminate\View\View
	 */
	public function all()
    {
	    $companies = TravelCompany::all();

	    return view('companies.all', ['companies'=>$companies]);
    }


	/**
	 * @param TravelCompany $travelCompany
	 * @param $slug
	 *
	 * @internal param $travel_companies
	 *
	 * @return \Illuminate\View\View
	 */
	public function single(TravelCompany $travelCompany, $slug)
	{
		$company = $travelCompany->where('slug',$slug)->first();
		$stations = $company->stations;
		$reviews = Review::where('travel_company_id', $company->id)->get();
		$images = $company->travel_company_picture;
		$bus_features = $company->bus_features;
		// dd($images);
		return view('companies.terminal',
			[
				'company'=>$company,
				'stations'=>$stations,
				'reviews'=>$reviews,
				'images'=>$images,
				'bus_features'=>$bus_features
			]);
	}


	/**
	 * @return \Illuminate\View\View
	 */
	public function dashboard()
	{
		$company_id = Auth::travel_company_staff()->get()->travel_company->id;
		$number_of_trips = Trip::whereraw('travel_company_id = ?', [$company_id])->count();
		$number_of_stations = Station::whereraw('travel_company_id = ?', [$company_id])->count();
		$number_of_paid_bookings = Booking::whereraw('travel_company_id = ? AND status = ?', [$company_id, 'paid'])->count();
		$number_of_travel_bookings = Booking::whereraw('travel_company_id = ? AND status = ? AND updated_at > ?',
			[$company_id, 'paid', Carbon::today()])->count();
		return view('companies.account.dashboard',
			[
				'number_of_trips' => $number_of_trips,
				'number_of_stations'=> $number_of_stations,
				'number_of_paid_bookings'=> $number_of_paid_bookings,
				'number_of_travel_bookings'=> $number_of_travel_bookings,
			]);
	}


	/**
	 * @return \Illuminate\View\View
	 */
	public function bookings()
	{
		$start = Carbon::today()->startOfDay();
		$end = Carbon::today()->endOfDay();
		$company_id = Auth::travel_company_staff()->get()->travel_company->id;
		$reserved_bookings = Booking::whereraw('travel_company_id = ? AND status = ?', [$company_id, 'reserved'])
			->whereBetween('updated_at', [$start, $end])
			->orderBy('updated_at', 'desc')
			->get();
		$paid_bookings = Booking::whereraw('travel_company_id = ? AND status = ?', [$company_id, 'paid'])
			->whereBetween('updated_at', [$start, $end])
			->orderBy('updated_at', 'desc')
			->get();
		$canceled_bookings = Booking::whereraw('travel_company_id = ? AND status = ?', [$company_id, 'canceled'])
			->whereBetween('updated_at', [$start, $end])
			->orderBy('updated_at', 'desc')
			->get();

		return view('companies.bookings.index',
			[
				'reserved_bookings'=>$reserved_bookings,
				'paid_bookings'=>$paid_bookings,
				'canceled_bookings'=>$canceled_bookings,
			]);
	}


	/**
	 * @return \Illuminate\View\View
	 */
	public function settings()
	{
		$company_id = Auth::travel_company_staff()->get()->travel_company->id;
		$travel_company = TravelCompany::findOrFail($company_id);
		$staffs = TravelCompanyStaff::whereraw('travel_company_id = ?', [$company_id])->get();
		$bus_features = BusFeature::all();
		return view('companies.settings.index',
			[
				'travel_company'=>$travel_company,
				'staffs'=>$staffs,
				'bus_features'=>$bus_features
			]);
	}


	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function profile_update(Request $request)
	{
		$travel_company = TravelCompany::find(Auth::travel_company_staff()->get()->travel_company->id);
//		dd($request->all());
		$this->validate($request,
			[
				'facebook_link'=>'url',
				'description'=>'min:30|max:200',
				'bus_features'=>'required',
				'name'=>'required',
				'country'=>'required',
				'city'=>'required',
				'region'=>'required',
			]);


		$input = $request->except(['password', 'c_password','confirm_password', 'bus_features']);
		$travel_company->update($input);

		$bus_features = $request->bus_features;
		$travel_company->bus_features()->attach($bus_features);
		return redirect()->route('company_settings');
	}


	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function add_staff(Request $request)
	{
		$this->validate($request,
			[
				'name'=>'required',
				'username'=>'unique:travel_company_staffs',
				'email'=>'required|unique:travel_company_staffs',
				'password'=>'required'
			]);
		$input=array_add($request->all(), 'travel_company_id', Auth::travel_company_staff()->get()->travel_company->id);
		TravelCompanyStaff::create($input);
		return redirect()->route('company_settings');
	}


	/**
	 * @param Request $request
	 */
	public function profile_logo(Request $request)
	{
		$travel_company = Auth::travel_company_staff()->get()->travel_company;

		$destinationPath = null;

		if(App::environment() == 'local')
		{
			$destinationPath = base_path().'/public/images/';
		}elseif(App::environment() == 'production')
		{
			$destinationPath = '/home/twokays/public_html/images/';
		}

		if($request->file('file')->isValid())
		{
			$file = $request->file('file');
			$ext = $file->getClientOriginalExtension();
			$destinationPath = $destinationPath;
			$fileName = str_slug($travel_company->name).'_logo.'.$ext;
			$full_path = '/images/'.$fileName;

			$file->move($destinationPath, $fileName); // uploading file to given path

			$tcl = Logo::where('travel_company_id', $travel_company->id)->first();
			if(!$tcl)
			{
				Logo::create(['path'=>$full_path, 'travel_company_id'=>$travel_company->id]);
			}else
			{
				$tcl->update(['path'=>$full_path]);
			}
			return $full_path;
		}
	}

	public function filter_bookings(Request $request)
	{
		$travel_company = Auth::travel_company_staff()->get()->travel_company;
		$company_id = $travel_company->id;
		$this->validate($request,
			[
				'start'=>'required',
				'end'=>'required',
			]);

		$end = Carbon::parse($request->end);
		$start = Carbon::parse($request->start);

		$reserved_bookings = Booking::whereraw('travel_company_id = ? AND status = ?', [$company_id, 'reserved'])
			->whereraw('updated_at <= ? AND created_at >= ?', [$end, $start])
			->orderBy('updated_at', 'desc')
			->get();
		$paid_bookings = Booking::whereraw('travel_company_id = ? AND status = ?', [$company_id, 'paid'])
			->whereraw('updated_at <= ? AND created_at >= ?', [$end, $start])
			->orderBy('updated_at', 'desc')
			->get();
		$canceled_bookings = Booking::whereraw('travel_company_id = ? AND status = ?', [$company_id, 'canceled'])
			->whereraw('updated_at <= ? AND created_at >= ?', [$end, $start])
			->orderBy('updated_at', 'desc')
			->get();

		return view('companies.bookings.index',
			[
				'reserved_bookings'=>$reserved_bookings,
				'paid_bookings'=>$paid_bookings,
				'canceled_bookings'=>$canceled_bookings,
			]);

	}

	public function password_change(Request $request)
	{
		$travel_company_staff = Auth::travel_company_staff()->get();

        $this->validate($request,
            [
                'password'=>'confirmed|min:8'
            ]);

        $input = $request->except('password_confirmation');

        $travel_company_staff->update($input);

        session()->flash('info', 'password has been changed');

        return redirect()->route('company_settings');
	}


	// public function profile_image(Request $request)
	// {
	// 	dd($request->all());
		
	// 	$destinationPath = null;
	// 	if(App::environment() == 'local')
	// 	{
	// 		$destinationPath = base_path().'/public/images/';
	// 	}elseif(App::environment() == 'production')
	// 	{
	// 		$destinationPath = '/home/twokays/public_html/images/';
	// 	}

	// 	if($request->file('file')->isValid())
	// 	{
	// 		$file = $request->file('file');
	// 		$ext = $file->getClientOriginalExtension();
	// 		$destinationPath = $destinationPath;
	// 		$fileName = str_slug($travel_company->name).'_image.'.$ext;
	// 		$full_path = '/images/'.$fileName;

	// 		$file->move($destinationPath, $fileName); // uploading file to given path

			// $tcl = TravelCompanyPicture::where('travel_company_id', $travel_company->id)->first();
			// if(!$tcl)
			// {
			// 	TravelCompanyPicture::create(['path'=>$full_path, 'travel_company_id'=>$travel_company->id]);
			// }else
			// {
			// 	$tcl->update(['path'=>$full_path]);
			// }
	// 	}
	// }

	public function profile_image(Request $request)
	{

		$travel_company = Auth::travel_company_staff()->get()->travel_company;

		$this->validate($request,
			[
				'terminal_images'=>'required'
			]);

		$terminal_images = $request->terminal_images;

		$n_o_i = count($terminal_images);

		$destinationPath = null;

		if(App::environment() == 'local')
		{
			$destinationPath = base_path().'/public/images/';
		}elseif(App::environment() == 'production')
		{
			$destinationPath = '/home/twokays/public_html/images/';
		}

		if(count($terminal_images) > 0)
		{
			for($i=0; $i<$n_o_i; $i++)
			{
				if($terminal_images[$i]->isValid())
				{
					$img = $terminal_images[$i];
					$file = $img;
					$ext = $file->getClientOriginalExtension();
					$destinationPath = $destinationPath;
					$fileName = str_slug($travel_company->name).'_image_' . $i . '.'.$ext;
					$full_path = '/images/'.$fileName;

					$file->move($destinationPath, $fileName); // uploading file to given path


					$tcl = TravelCompanyPicture::where('travel_company_id', $travel_company->id)->where('path', $full_path)->first();

					if(!$tcl)
					{
						TravelCompanyPicture::create(['path'=>$full_path, 'travel_company_id'=>$travel_company->id]);
					}else
					{
						$tcl->update(['path'=>$full_path]);
					}

				}
			}
		}
		else
		{
			return redirect()->back()->withErrors('Please Choose at least an image');
		}

		return redirect()->route('company_settings');

	}

}
