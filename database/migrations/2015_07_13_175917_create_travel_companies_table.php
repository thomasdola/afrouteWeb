<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_companies', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->text('description')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('location_url')->nullable();
            $table->string('address')->nullable();
            $table->string('facebook_link')->nullable();
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
        Schema::drop('travel_companies');
    }
}
