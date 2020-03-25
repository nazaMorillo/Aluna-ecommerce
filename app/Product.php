<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    public $guarded = [];

    public function users(){
        return $this->belongsToMany(User::class, "carts", "product_id","user_id");
    }
}
