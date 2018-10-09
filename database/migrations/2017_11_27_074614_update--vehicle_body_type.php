<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateVehicleBodyType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /*Schema::table('vehicle_body_types',function(Blueprint $table)
       {
           $table->integer('vehicle_type_id')->unsigned();
           $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types')->onDelete('cascade');
       }
           );
        * */
       
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
