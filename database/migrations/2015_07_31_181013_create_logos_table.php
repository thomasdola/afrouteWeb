<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logos', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('path')->nullable();
	        $table->integer('travel_company_id')->unsigned()->index()->nullable();
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
        Schema::drop('logos');
    }
}
