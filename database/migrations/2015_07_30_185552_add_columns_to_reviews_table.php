<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->text('body');
	        $table->integer('user_id')->unsigned()->index();
	        $table->foreign('user_id')->references('id')->on('users');
	        $table->integer('travel_company_id')->unsigned()->index();
	        $table->foreign('travel_company_id')->references('id')->on('travel_companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('body');
	        $table->dropColumn('user_id');
	        $table->dropColumn('travel_company_id');
	        $table->dropForeign('user_id');
	        $table->dropForeign('travel_company_id');
        });
    }
}
