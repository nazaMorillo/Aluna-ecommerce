<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('products');

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("image", 100);
            $table->string("name", 100);
            $table->string("description", 200);
            $table->decimal("price", 9, 2);
            $table->integer('stock');

            $table->unsignedBigInteger("brand_id");
            $table->unsignedBigInteger("category_id");

            // $table->foreign('brand_id')
            //         ->references('id')
            //         ->on('brands');

            // $table->foreign('category_id')
            //         ->references('id')
            //         ->on('category');

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
        // Schema::table("products", function (Blueprint $table) {
        //     $table->dropForeign('products_brand_id_foreign');
        //     $table->dropForeign('products_category_id_foreign');
        // });

        Schema::dropIfExists('products');
    }
}
