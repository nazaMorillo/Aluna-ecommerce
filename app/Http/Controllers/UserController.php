<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Cart;

class UserController extends Controller
{
    public function addToCart($id, $idProduct){
        $estaEncarrito = Cart::find($id)->where('product_id', "=", $idProduct);
        // if (!in_array($id, $estaEncarrito->product_id)) {
            $cart = new Cart();        
            $cart->user_id = $id;
            $cart->product_id = $idProduct;
            $cart->save();
            $enCarrito= $idProduct;

            $productos= Product::paginate(20);
            $producto = Product::find($idProduct);
            $nuevoStock = $producto->stock -= 1;
            $producto->save();
            
            $class="deactivate";
            $vac = compact("productos", "enCarrito","nuevoStock","class");
        // }else{
        //     $productos= Product::paginate(20);
        //     $vac = compact("productos");
        // }
        
        return view('/pages.listado', $vac); 
    }
}
