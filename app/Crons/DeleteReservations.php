<?php
	use App\Booking;
	use App\Trip;
	use Carbon\Carbon;

	/**
 * Created by PhpStorm.
 * User: THOMAS
 * Date: 8/9/2015
 * Time: 6:54 AM
 */

class DeleteReservations {

	/**
	 * A cron that will delete all reservations 24hours to the trip departure date
	 */
	public function clean()
	{
		$start = Carbon::today()->startOfDay();
		$end = Carbon::today()->endOfDay();
		$trip_ids = Trip::whereBetween('departure_date', [$start, $end])->lists('id')->toArray();
        $cleaned = Booking::where('status','reserved')
	            ->whereIn('trip_id', $trip_ids)
                ->delete();

		return $cleaned;
	}

} 