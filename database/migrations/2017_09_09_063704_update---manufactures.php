<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateManufactures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('manufactures',function(Blueprint $table)
       {
        $table->dropColumn('icon_url');
        $table->dropColumn('title');
        $table->integer('brand_id')->unsigned();
           $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        

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
