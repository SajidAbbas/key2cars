<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_type')->unsigned();
            $table->foreign('vehicle_type')->references('id')->on('vehicle_types')->onDelete('cascade');
            $table->integer('model')->unsigned();
            $table->foreign('model')->references('id')->on('models')->onDelete('cascade');
            $table->integer('model_version')->unsigned();
            $table->foreign('model_version')->references('id')->on('model_versions')->onDelete('cascade');
            $table->string('description');
            $table->boolean('isActive');
            $table->boolean('isFeatured');
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
        Schema::drop('news');
    }
}
