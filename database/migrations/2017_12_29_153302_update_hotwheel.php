<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateHotwheel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('hot_wheels',function(Blueprint $table)
       {
           $table->string('title');
           $table->integer('city_area_id')->unsigned();
           $table->foreign('city_area_id')->references('id')->on('city_areas')->ondelete('cascade');
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
