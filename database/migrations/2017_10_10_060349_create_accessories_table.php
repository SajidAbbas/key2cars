<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accessories', function (Blueprint $table) {
            /*$table->increments('id');
            $table->string('title');
            $table->double('price');
            $table->integer('car_type')->unsigned();
            $table->foreign('car_type')->references('id')->on('vehicle_types')->onDelete('cascade');
            $table->integer('city')->unsigned();
            $table->foreign('city')->references('id')->on('cities')->onDelete('cascade');
           $table->string('condition');
           $table->string('description');
             *  $table->timestamps();
             */
            $table->dropColumn('user_id');
           /*$table->integer('user_id')->unsigned();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accessories');
    }
}
