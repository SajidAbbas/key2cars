<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateVehicle22 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles',function(Blueprint $table)
        {
            /*$table->dropColumn('color');
            $table->dropColumn('model_year');
            
             $table->integer('color_id')->unsigned();*/
           $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
        

            

           // $table->integer('model_year_id')->unsigned();
            $table->foreign('model_year_id')->references('id')->on('model_years')->onDelete('cascade');


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
