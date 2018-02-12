<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class CreateGeoLocationTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('geo_location', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            //latitude
            $table->decimal('lat', 10, 6);
            //longitude
            $table->decimal('lon', 10, 6);
            //date of the original request made by the participant, defaults to the current time todo: check if default works
            $table->dateTime('request_timestamp')->default(DB::raw('CURRENT_TIMESTAMP'));
            //flag that shows whether the retrieval and saving was executed or not
            $table->boolean('executed')->default(false);
            //user id of the main api's accessing user
            $table->integer('user_id')->unsigned();//->nullable()->default(null);
            //hashed user_id from the main api
            $table->string("participant_id");
        });
        Schema::table('geo_location', function (Blueprint $table) {

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('geo_location');
    }
}