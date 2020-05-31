<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'category';
    public $guarded = [];
    protected $fillable = [
        'id', 'name', 'created_at', 'updated_at'
    ];

    public $timestamps = true;

    // public function products()
    // {
    //     return $this->hasMany(Product::class, "category_id");
    // }

    public function products()
    {
        return $this->belongsToMany(Product::class, "category_products", "product_id", "category_id");
    }
}
