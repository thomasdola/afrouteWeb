<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('departure_station');
            $table->integer('stops');
            $table->string('fare');
            $table->string('destination_station');
            $table->string('transport_model');
            $table->string('trip_type');
            $table->date('departure_date');
            $table->string('departure_time');
            $table->string('duration');
            $table->string('boarding_point');
            $table->string('code');
	        $table->integer('travel_company_id')->unsigned()->index();
	        $table->foreign('travel_company_id')->references('id')->on('travel_companies')
		        ->onDelete('cascade')
		        ->onUpdate('cascade');
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
        Schema::drop('trips');
    }
}
