<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateVehicleCondtionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('vehicle_conditions',function(Blueprint $table)
        {
            
            $table->integer('ads_id')->unsigned();
            $table->foreign('ads_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->integer('condition_detail_id')->unsigned();
            $table->foreign('condition_detail_id')->references('id')->on('condition_details')->onDelete('cascade');
            $table->integer('condition_detail_value_id')->unsigned();
            $table->foreign('condition_detail_value_id')->references('id')->on('condition_detail_values')->onDelete('cascade');
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
        //
    }
}
