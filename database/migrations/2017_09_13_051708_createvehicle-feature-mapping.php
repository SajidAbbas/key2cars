<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatevehicleFeatureMapping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_feature_mapping', function(Blueprint $table)
        {
           $table->increments('id');
           $table->integer('post_id')->unsigned();
           $table->foreign('post_id')->references('id')->on('vehicles')->onDelete('cascade');
           $table->integer('feature_id')->unsigned();
           $table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade');
         


        });
    
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
