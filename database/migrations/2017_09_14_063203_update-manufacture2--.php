<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateManufacture2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('models',function(Blueprint $table)
        {
            $table->dropColumn('body_type_id');
           $table->integer('bodytype_id')->unsigned();
            $table->foreign('bodytype_id')->references('id')->on('vehicle_body_types')->onDelete('cascade');

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
