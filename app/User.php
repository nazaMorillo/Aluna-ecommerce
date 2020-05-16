<?php

namespace App;

use App\Cart;
use App\Role;
use App\User;
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
        'surname','name', 'email', 'password', 'avatar', 'address'
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
        return $this->belongsToMany(Role::class);
    }

    public function authorizeRoles($roles) {
        if(is_array($roles)) {
            return $this->hasAnyRole($roles) || abort(401, 'No autorizado');
        }

        return $this->hasRole($roles) || abort(401, 'No Autorizado');

    }

    public function hasAnyRole($roles) {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

   public function hasRole($role) {

        // $roles_array = explore("|", $roles);

        // if($this->roles()->whereIn('name', $roles_array)->first()) {
        //     return true;
        // }

        // return false;  Para multiples usuarios  

       return null !== $this->roles()->where('name', $role)->first();
    } 

// function hasRoles(array $roles){
//     foreach($roles as $role){
//       if($this->role === $role){
//           return true;
//       }
//     }
//     return false;
  

}
