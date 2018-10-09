<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create2VehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->index();
            
            $table->integer('vehicle_type_id')->unsigned();
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types')->onDelete('cascade');
            
            $table->integer('manufacture_id')->unsigned();
            $table->foreign('manufacture_id')->references('id')->on('manufactures')->onDelete('cascade');
            
            $table->integer('model_id')->unsigned();
            $table->foreign('model_id')->references('id')->on('models')->onDelete('cascade');
            
            $table->integer('model_version_id')->unsigned();
            $table->foreign('model_version_id')->references('id')->on('model_versions')->onDelete('cascade');

            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->integer('city_area_id')->unsigned();
            $table->foreign('city_area_id')->references('id')->on('city_areas')->onDelete('cascade');

            $table->double('price')->index();
            $table->string('description');

            $table->integer('transmission_id')->unsigned();
            $table->foreign('transmission_id')->references('id')->on('transmissions')->onDelete('cascade');

            $table->integer('assembly_id')->unsigned();
            $table->foreign('assembly_id')->references('id')->on('assemblies')->onDelete('cascade');

            $table->integer('reg_city_id')->unsigned();
            $table->foreign('reg_city_id')->references('id')->on('cities')->onDelete('cascade');

            
            $table->boolean('featured')->index();


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
