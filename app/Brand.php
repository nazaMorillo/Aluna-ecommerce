<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $guarded = [];
    protected $fillable = [
        'id', 'name', 'created_at', 'updated_at'
       ];
}
