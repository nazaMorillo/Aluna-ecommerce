<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\User;

class Product extends Model{
    public $guarded = [];

    public function users(){
        return $this->belongsToMany("App\User", "carts", "product_id","user_id");
    }
}
