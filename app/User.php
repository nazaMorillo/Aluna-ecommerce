<?php

namespace App;

use App\Cart;
use App\Role;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $listaProductos=[];
    protected $fillable = [
        'surname','name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products(){
        return $this->belongsToMany(Product::class, "carts", "user_id","product_id")->withPivot('id');
    }

    public function decrementProductStock(Product $product){
        
        $producto = Product::find($product->id);
        $producto->stock -= 1;
        $producto->save();        
        // $vac = compact("producto","nuevoStock");
        return ($producto);  
    }

    public function roles() {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
