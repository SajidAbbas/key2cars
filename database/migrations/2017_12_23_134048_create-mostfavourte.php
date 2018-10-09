<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMostfavourte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('most_feature_vehicles',function(Blueprint $table)
       {
           $table->increments('id');
           $table->string('title');
           $table->string('description');
           $table->string('url');
           $table->integer('vehicle_type')->unsigned();
           $table->foreign('vehicle_type')->references('id')->on('vehicle_types')->onDelete('cascade');
           $table->boolean('active');
           $table->timestamps();
           
       }
           );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
