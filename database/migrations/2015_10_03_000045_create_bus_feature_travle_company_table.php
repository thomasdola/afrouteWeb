<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusFeatureTravleCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_feature_travel_company', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bus_feature_id')->unsigned();
            $table->integer('travel_company_id')->unsigned();
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
        Schema::drop('bus_feature_travel_company');
    }
}
