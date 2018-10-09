<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdteVehicl extends Migration
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
            $table->integer('verfication_code');
            $table->string('email');
            $table->boolean('isActive');
            $table->boolean('featured_request');
            $table->boolean('isVerifed');
            
            
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
