<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDealerCategoryMapping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dealer_category_maping',function(Blueprint $table)
        {
            $table->integer('vehicle_type')->unsigned();
            $table->foreign('vehicle_type')->references('id')->on('vehicle_types')->onDelete('cascade');
            
            
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
