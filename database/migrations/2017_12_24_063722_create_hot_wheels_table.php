<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotWheelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::create('hot_wheels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('make')->unsigned();
            $table->foreign('make')->references('id')->on('manufactures')->onDelete('cascade');
            $table->integer('model')->unsigned();
            $table->foreign('model')->references('id')->on('models')->onDelete('cascade');
            $table->string('description');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('number');
            $table->timestamps();
        });
        * 
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hot_wheels');
    }
}
