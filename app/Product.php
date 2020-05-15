<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    
    public $guarded = [];

    protected $fillable = [
        'image', 'name', 'description', 'price', 'stock', 'brand', 'category'
       ];
       
       public $timestamps = true;

    public function users(){
        return $this->belongsToMany(User::class, "carts", "product_id","user_id");
    }
}
