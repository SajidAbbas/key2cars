<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('shop_discount_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
           
            $table->timestamps();
        });
        
        Schema::create('shop_discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('discount');
            $table->boolean('is_percentage');
            $table->integer('discount_type')->unsigned();
            $table->foreign('discount_type')->references('id')->on('shop_discount_types')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('times_used')->default(0);
            $table->integer('max_discount_amount')->nullable();
            $table->integer('min_amount')->nullable();
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
        Schema::dropIfExists('shop_discounts');
    }
}
