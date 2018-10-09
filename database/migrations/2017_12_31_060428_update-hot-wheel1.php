<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateHotWheel1 extends Migration
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
             $table->boolean('isDeleted');
             $table->string('status');
             $table->boolean('isVerified');
             $table->string('verification_code');
           
             
             
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
