<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        'image'=>"http://lorempixel.com/400/200/technics",
        'produc_name'=>$faker->text(10),
        'description'=>$faker->text(45),
        'price'=>$faker->randomFloat(2, 300, 1000),
        'stock'=>$faker->numberBetween($min = 1000, $max = 9000),
        'brand'=>$faker->text(8),
        'category'=>$faker->text(8)
    ];
});
