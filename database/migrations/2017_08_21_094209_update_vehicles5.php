<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateVehicles5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
           
            $table->integer('engine_type_id')->unsigned();
            $table->foreign('engine_type_id')->references('id')->on('engine_types')->onDelete('cascade');
            $table->string('color')->index();
            $table->integer('engine_capacity');
            $table->double('mileage');
            
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
