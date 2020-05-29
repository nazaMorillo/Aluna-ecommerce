<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Brand extends Model
{
    public $guarded = [];
       
       public $timestamps = true;


    public function products(){
        return $this->hasMany(Product::class, "brand_id");
    }
    
    protected $fillable = [
        'id', 'name', 'created_at', 'updated_at'
       ];
}
