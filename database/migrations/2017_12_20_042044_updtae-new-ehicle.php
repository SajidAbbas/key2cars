<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdtaeNewEhicle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('new_vehicles',function(Blueprint $table)
        {/*
            $table->string('price');
            $table->string('mileage');
            $table->integer('transmission')->unsigned();
            $table->foreign('transmission')->references('id')->on('transmissions')->onDelete('cascade');
            $table->integer('engine_type')->unsigned();
            $table->foreign('engine_type')->references('id')->on('egine_types')->onDelete('cascade');
            $table->integer('engine_capacity');
            $table->integer('city')->unsigned();
            $table->foreign('city')->references('id')->on('cities')->onDelete('cascade');
           */ 
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
