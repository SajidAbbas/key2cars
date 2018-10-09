<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->string('img_url')->nullable();
            $table->integer('parent_category')->unsigned()->nullable();
            $table->foreign('parent_category')->references('id')->on('categories')->onDelete('cascade');
             $table->float('discount')->nullable();
            $table->boolean('featured')->default(0);
            $table->boolean('published')->default(1);
            $table->integer('display_order');
            
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
        Schema::dropIfExists('shop_categories');
    }
}
