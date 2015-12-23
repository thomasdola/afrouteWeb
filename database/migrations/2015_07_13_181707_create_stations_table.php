<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('country');
            $table->string('region');
            $table->string('city');
            $table->string('location');
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
        Schema::drop('stations');
    }
}
