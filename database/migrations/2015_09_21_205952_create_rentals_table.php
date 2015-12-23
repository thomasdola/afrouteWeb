<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('departing_address');
	        $table->string('destination_address');
	        $table->timestamp('departing_date');
	        $table->timestamp('returning_date')->nullable();
	        $table->string('trip_type');
	        $table->string('departing_time');
	        $table->string('returning_time')->nullable();
	        $table->string('customer_name');
	        $table->string('customer_email');
	        $table->string('customer_phone_number');
	        $table->integer('number_of_bus');
	        $table->integer('bus_id')->unsigned();
            $table->foreign('bus_id')->references('id')->on('buses')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('rentals');
    }
}
