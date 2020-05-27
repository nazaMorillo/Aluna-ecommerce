<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyIdProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('products', function(Blueprint $table){
            $table->integer('brand')->charset(null)->collation(null)->change();
            $table->integer('category')->charset(null)->collation(null)->change();
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
        Schema::table('products', function(Blueprint $table){
            $table->string("brand", 200)->charset(null)->collation(null)->change();
            $table->string("brand", 200)->charset(null)->collation(null)->change();
        });
    }
}
