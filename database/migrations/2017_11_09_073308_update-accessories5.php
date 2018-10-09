<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAccessories5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
       Schema::table('accessories', function (Blueprint $table) {
             
            // $table->integer('city_area_id')->unsigned();
             $table->foreign('city_area_id')->references('id')->on('city_areas')->onDelete('cascade');
           
           
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
