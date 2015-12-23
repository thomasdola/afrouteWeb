<?php

namespace App\Console;

use App\Booking;
use App\Trip;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function()
        {
	        $trip_ids = Trip::where('departure_date', Carbon::today())->lists('id')->toArray();
	        Booking::where('status','reserved')
		            ->whereIn('trip_id', $trip_ids)
                    ->delete();
        })->everyMinute();
    }
}
