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
}
