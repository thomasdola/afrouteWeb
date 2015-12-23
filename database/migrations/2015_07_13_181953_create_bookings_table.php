<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('passenger_name');
            $table->string('passenger_sex');
            $table->string('passenger_id_type');
            $table->string('passenger_id_number');
            $table->date('passenger_id_exp_date');
            $table->date('passenger_dob');
            $table->string('passenger_citizenship');
            $table->string('passenger_reporting_time');

            $table->integer('trip_id')->unsigned()->index();
            $table->foreign('trip_id')->references('id')->on('trips')
	            ->onDelete('no action')
                ->onUpdate('cascade');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')
	            ->onDelete('no action')
                ->onUpdate('cascade');

            $table->integer('travel_company_id')->unsigned()->index();
            $table->foreign('travel_company_id')->references('id')->on('travel_companies')
                ->onDelete('no action')
                ->onUpdate('cascade');

	        $table->string('code');
            $table->string('status')->default('reserved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bookings');
    }
}
