<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Brand extends Model
{
    public $guarded = [];

    protected $fillable = ['name'];
       
       public $timestamps = true;


    public function products(){
        return $this->hasMany(Product::class, "brand_id");
    }
    
}
