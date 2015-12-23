<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelCompanyPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_company_pictures', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('path');
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
        Schema::drop('travel_company_pictures');
    }
}
