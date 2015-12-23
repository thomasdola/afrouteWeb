<?php

namespace App\Http\Controllers;

use App\CashCode;
use Carbon\Carbon;
use CouponCode\CouponCode;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class CashCardController extends Controller
{
	/**
	 * @var CouponCode
	 */
	private $cashcode;

	public function __construct(CouponCode $cashcode)
	{

		$this->cashcode = $cashcode;
	}

	/**
	 * @param Request $request
	 *
	 * @throws \Exception
	 */
	public function generate(Request $request)
    {
	    $this->validate($request,
		    [
			    'price'=>'required|integer',
			    'number'=>'required|integer'
		    ]);

	    $rows = $request->number;
	    $price = $request->price;
	    $data = [];
	    $date = Carbon::today()->toFormattedDateString();
	    for($i=1; $i<=$rows; $i++) {
		    $code = $this->cashcode->generate();
		    $data = array_add($data, $i, $code);
		    $input = array_add($request->only('price'), 'code', $code);
		    CashCode::create($input);
	    }
		$data = CashCode::whereraw('price = ?', [$price])->get();
	    Excel::create("CashCard Codes for {$price} == {$date}", function($excel) use ($data){
	        $excel->sheet('CashCard Codes One', function($sheet) use ($data) {
	            $sheet->loadView('partials.code_table')
	                ->withCodes($data);
	        }) ->download('csv');
	    });
    }
}
