<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedInteger('user_id');
            // $table->unsignedInteger('product_id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');

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
        Schema::table("carts",function(Blueprint $table) {
            $table->dropForeign('carts_users_id_foreign');
            $table->dropForeign('carts_products_id_foreign');
            
          });
        Schema::dropIfExists('carts');
        
    }
}
