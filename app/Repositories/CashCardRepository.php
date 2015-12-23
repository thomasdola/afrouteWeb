<?php
/**
 * Created by PhpStorm.
 * User: THOMAS
 * Date: 7/28/2015
 * Time: 4:21 PM
 */

namespace App\Repositories;

use App\Payment;
use App\Trip;
use App\CashCode;
use Illuminate\Support\Facades\Session;

class CashCardRepository {

	/**
	 * @param $code
	 * @param $trip_id
	 * @param $passengers
	 *
	 * @return bool
	 */
	public  function checkIfCashCardCodeIsValid($code, $trip_id, $passengers)
		{
			$trip = Trip::find($trip_id);
			$card = CashCode::whereraw('code = ?',[$code])->first();
			if($card)
			{
				$price = $card->price;
				$card_id = $card->id;

				if($price == $trip->fare*$passengers)
				{
					Session::put('card_id', $card_id);
					$this->useCard($card_id);
					return true;
				}elseif($price > $trip->fare*$passengers)
				{
					Session::put('card_id', $card_id);
					$this->useCard($card_id);
					return true;
				}else
				{
					return false;
				}
			}else
			{
				return false;
			}
		}

		private function useCard($card_id)
		{
			CashCode::find($card_id)->delete();
		}

} 