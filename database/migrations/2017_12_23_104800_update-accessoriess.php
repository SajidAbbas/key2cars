<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAccessoriess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('accessories',function(Blueprint $table)
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
