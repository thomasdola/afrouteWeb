<?php

namespace App\Http\Controllers;

use App\Booking;
use App\TravelCompany;
use App\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Payment;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Vsmoraes\Pdf\Pdf;

class AdminReportsController extends Controller
{
	/**
	 * @var Pdf
	 */
	private $pdf;

	/**
	 * @param Pdf $pdf
	 */
	public function __construct(Pdf $pdf){
		$this->pdf = $pdf;
	}

    public function index()
    {
	    return view('admin.reports.index');
    }

	public function booking_reports_index()
	{
        $travel_companies = TravelCompany::all();
		return view('admin.reports.booking.index',
            [
                'companies'=>$travel_companies
            ]);
	}

	public function general_report_generate(Request $request)
	{
		$this->validate($request,['start'=>'required','end'=>'required','type'=>'required', 'file_format'=>'required']);

		$type = $request->type;

		$file_format = $request->file_format;

		$start = $this->carbonize($request->start);
		$end = $this->carbonize($request->end);

		if($start->gt($end)) session()->flash('info', 'Date Range Invalid');

		$s_start = Carbon::parse($request->start)->toFormattedDateString();
		$s_end = Carbon::parse($request->end)->toFormattedDateString();


		if($type == 'transactions')
		{
			$model = $this->getModel($type);
			$companies = $this->getQueryData($start, $end, $model);
			$title = $this->makeFileTitle($type, $s_start, $s_end);
			$viewPath = 'admin.reports.report.ct_table';
			$dataName = 'companies';
			$template_path = "admin.reports.pdf.transactions";

			if($companies-> count() > 0)
			{
				$this->generateReport($file_format, $companies, $title, $viewPath, $dataName, $s_start, $s_end, $template_path);
			}else
			{
				session()->flash('info', 'No Data Found');
				return redirect()->route('admin_reports');
			}

		}elseif($type == 'users')
		{
			$model = $this->getModel($type);
			$users = $this->getQueryData($start, $end, $model);
			$title = $this->makeFileTitle($type, $s_start, $s_end);
			$viewPath = 'admin.reports.report.us_table';
			$dataName = 'users';
			$template_path = 'admin.reports.pdf.users';

			if($users -> count() > 0)
			{
				$this->generateReport($file_format, $users, $title, $viewPath, $dataName, $s_start, $s_end, $template_path);
			}else
			{
				session()->flash('info', 'No Data Found');
				return redirect()->route('admin_reports');
			}


		}elseif($type == 'companies')
		{
			$model = $this->getModel($type);
			$payments = $this->getQueryData($start, $end, $model);
			$title = $this->makeFileTitle($type, $s_start, $s_end);
			$viewPath = 'admin.reports.report.co_table';
			$dataName = 'companies';
			$template_path = 'admin.reports.pdf.companies';

			if($payments -> count() > 0)
			{
				$this->generateReport($file_format, $payments, $title, $viewPath, $dataName, $s_start, $s_end, $template_path);
			}else
			{
				session()->flash('info', 'No Data Found');
				return redirect()->route('admin_reports');
			}

		}

	}

    public function booking_reports_to_generate(Request $request)
    {
        $terminal = TravelCompany::where('slug', $request->travel_terminal)->first();
        $trips = Trip::where('travel_company_id', $terminal->id)->get();

        return view('admin.reports.booking.report_generate',
            [
                'trips'=>$trips,
                'travel_company'=>$terminal->name
            ]);

    }


    public function booking_report_generate(Request $request)
    {
        $this->validate($request,['trip_id'=>'required']);

        $trip_id = $request->trip_id;

        $bookings = Booking::where('trip_id', $trip_id)
                        ->where('status', 'paid')
                        ->get();

        if(!$bookings)
        {
            session()->put('info', 'No Data');
            return redirect()->back();
        }

        $trip = Trip::find($trip_id);
        $date = Carbon::today()->toFormattedDateString();

        $this->downloadBookingReportInPdf($bookings, $date, $trip);

//        dd($request->all(), $bookings, $trip);

    }


	/**
	 *
	 * Generate and download the report in excel sheet
	 *
	 * @param $data
	 * @param $title
	 * @param $viewPath
	 * @param $dataName
	 * @param $start
	 * @param $end
	 */
	private function downloadGeneralReportInExcel($data, $title, $viewPath, $dataName, $start, $end)
	{
		Excel::create($title, function($excel) use($data, $title, $viewPath, $dataName, $start, $end){
		    $excel->sheet($start.' to '.$end, function($sheet) use($data, $dataName, $viewPath, $start, $end) {
		        $sheet->loadView($viewPath, ['start'=>$start, 'end'=>$end])->with($dataName, $data);
		    });
		})->download();
	}


	/**
	 * @param $type
	 * @param $start
	 * @param $end
	 *
	 * @return string
	 */
	private function makeFileTitle($type, $start, $end)
	{
		switch($type)
		{
			case "companies":
				return 'Companies registered from '.$start.' to '.$end;
				break;
			case "transactions":
				return 'Summary of Companies Transactions registered from '.$start.' to '.$end;
				break;
			case "users":
				return 'Users joined \'afroute\' platform from '.$start.' to '.$end;
				break;
		}
	}


	/**
	 * @param $start
	 * @param $end
	 * @param $model
	 *
	 * @return mixed
	 */
	private function getQueryData($start, $end, $model)
	{
		if($model == "Payment")
		{
			$data = Payment::whereBetween('created_at', [$start, $end])
							->orderBy('created_at', 'desc')
							->get();
		}elseif($model == "TravelCompany")
		{
			$data = TravelCompany::whereBetween('created_at', [$start, $end])
							->orderBy('created_at', 'desc')
							->get();
		}elseif($model == "User")
		{
			$data = User::whereBetween('created_at', [$start, $end])
							->orderBy('created_at', 'desc')
							->get();
		}

		return $data;
	}


	/**
	 * @param $type
	 *
	 * @return string
	 */
	private function getModel($type)
	{
		if($type == 'transactions' OR $type == 'companies')
		{
			return 'TravelCompany';
		}elseif($type == 'Users')
		{
			return 'User';
		}elseif($type == 'Accounting')
		{
			return 'Payment';
		}
	}

	/**
	 *
	 * Generate a Carbon instance
	 *
	 * @param $date
	 *
	 * @return static
	 */
	private function carbonize($date)
	{
		return Carbon::parse($date);
	}

	/**
	 * @param $template_path
	 * @param $s_from
	 * @param $s_to
	 * @param $data
	 * @param $today
	 * @param $title
	 *
	 * @return mixed
	 */
	private function downloadGeneralReportInPdf($template_path, $s_from, $s_to, $data, $today, $title)
	{
		$html = view($template_path,
			[
				'from'=>$s_from,
				'to'=>$s_to,
				'data' => $data,
				'today'=>$today,
				'title'=>$title
			])->render();
		return $this->pdf->load($html)->download();
	}


    private function downloadBookingReportInPdf($data, $date, $trip)
    {
        $html = view('admin.reports.booking.templates.pdf',
            [
                'date'=>$date,
                'bookings'=>$data,
                'trip'=>$trip,
            ])->render();
        return $this->pdf->load($html)->download();
    }


	private function generateReport($file_format, $companies, $title, $viewPath, $dataName, $s_start, $s_end, $template_path)
	{
		switch ($file_format)
		{
			case "excel":
				$this->downloadGeneralReportInExcel($companies, $title, $viewPath, $dataName, $s_start, $s_end);
				break;
			case "pdf":
				$today = Carbon::today()->toFormattedDateString();
				$this->downloadGeneralReportInPdf($template_path, $s_start, $s_end, $companies, $today, $title);
				break;
		}
	}

}
