<?php
/**
 * Created by PhpStorm.
 * User: THOMAS
 * Date: 7/22/2015
 * Time: 3:31 PM
 */

namespace App\Repositories;


use App\Trip;
use Carbon\Carbon;

class TimeRepository {


	/**
	 * @param $date
	 *
	 * @return static
	 */
	public function carbonize($date)
	{
		return Carbon::parse($date);
	}

	/**
		 * @param $trip_time
		 * @param $trip_date
		 *
		 * @return array
		 */
		public function getTimeFrame($trip_time, $trip_date)
		{
			$td = $trip_date;
			if($trip_time == "Morning")
			{
				return $this->morningFrame($td);
			}elseif($trip_time == "Afternoon")
			{
				return $this->afternoonFrame($td);
			}else
			{
				return $this->eveningFrame($td);
			}
		}

		/**
		 * @param $td
		 *
		 * @return array
		 */
		private function morningFrame($td)
		{
			$from = $td->copy()->addHours(3);
			$to = $td->copy()->addHours(11)->addMinutes(59);
			return compact('from', 'to');
		}

		/**
		 * @param $td
		 *
		 * @return array
		 */
		private function afternoonFrame($td)
		{
			$from = $td->copy()->copy()->addHours(12);
			$to = $td->copy()->copy()->addHours(17)->addMinutes(59);
			return compact('from', 'to');
		}

		/**
		 * @param $td
		 *
		 * @return array
		 */
		private function eveningFrame($td)
		{
			$from = $td->copy()->addHours(18);
			$to = $td->copy()->addHours(23)->addMinutes(59);
			return compact('from', 'to');
		}

		/**
		 * @param $time
		 *
		 * @return bool|string
		 */
		public function timeStringtify($time)
		{
			return date("H:i", strtotime($time));
		}

	/**
	 * @param $trip
	 * @param $normalTime
	 *
	 * @return mixed
	 */
	public function carbonDate($trip_id, $normalTime)
		{
			$trip = Trip::find($trip_id);
			$departure_date = $trip->departure_date;
			$year = $departure_date->year;
			$month = $departure_date->month;
			$day = $departure_date->day;
			$hour = $normalTime->hour;
			$min = $normalTime->minute;
			$reporting_time = Carbon::create($year, $month, $day, $hour, $min);
//			dd($reporting_time);
			return $reporting_time;
		}

		/**
		 * @param $reporting_time
		 * @param $time_frame
		 *
		 * @return bool
		 */
		public function isTimeCorrect($reporting_time, $time_frame, $trip_id)
		{
			$trip = Trip::find($trip_id);
//			dd($trip);
			$realTime = $this->carbonDate($trip_id, $this->carbonize($this->timeStringtify($reporting_time)));
			$from = $time_frame['from'];
			$to = $time_frame['to'];
			if($from <= $realTime AND $realTime <= $to)
			{
//				dd('cool');
				return true;
			}else
			{
//				dd($realTime);
				return false;
			}
		}

	/**
	 *
	 */
	public function currentTimeFrame()
	{
		$today = Carbon::today();
		$mFrame = $this->morningFrame($today);
		$aFrame = $this->afternoonFrame($today);
		$eFrame = $this->eveningFrame($today);
		$now = Carbon::now();
		if($mFrame['from'] <= $now AND $now <= $mFrame['to'])
		{
			return 'Morning';
		}elseif($aFrame['from'] <= $now AND $now <= $aFrame['to'])
		{
			return 'Afternoon';
		}else
		{
			return 'Evening';
		}
	}

} 