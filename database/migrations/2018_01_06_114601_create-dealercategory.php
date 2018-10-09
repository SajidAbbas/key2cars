<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealercategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('dealer_category_maping',function(Blueprint $table)
       {
           $table->increments('id');
           $table->integer('dealer_id')->unsigned();
           $table->foreign('dealer_id')->references('id')->on('vehicle_types')->onDelete('cascade');
           $table->boolean('active');
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
