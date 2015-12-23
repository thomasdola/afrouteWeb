<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelCompanyStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_company_staffs', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('name');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->integer('phone')->nullable();
            $table->string('password', 60);
	        $table->rememberToken();
	        $table->integer('type');
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
        Schema::drop('travel_company_staffs');
    }
}
