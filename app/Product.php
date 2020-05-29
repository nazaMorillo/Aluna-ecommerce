<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Product extends Model{
    
    public $guarded = [];

    protected $fillable = [
        'image', 'name', 'description', 'price', 'stock', 'brand_id', 'category_id'
       ];
       
       public $timestamps = true;

    public function users(){
        return $this->belongsToMany(User::class, "carts", "product_id","user_id");
    }

    public function brand(){
        return $this->belongsTo(Brand::class, "brand_id");
    }
}
