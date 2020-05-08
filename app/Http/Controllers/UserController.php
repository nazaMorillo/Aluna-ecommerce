<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Cart;

class UserController extends Controller
{
    /*public function addToCart($id, $idProduct){
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
    }*/

    public function addToCart(Request $req){
        $agregarACarrito = new Cart();
        $agregarACarrito->user_id = auth()->user()->id;
        $agregarACarrito->product_id = $req['productid'];
        $agregarACarrito->save();
        return redirect('/listado');
    }

    public function viewCart(){
        $user = User::find(auth()->user()->id);
        $productos = $user->products()->orderBy('pivot_id','desc')->get();
        $vac = compact('productos');
        return view('pages.carrito',$vac);
    }

    public function dropToCart(Request $req){
        $idusuario = auth()->user()->id;
        $eliminarCarrito = Cart::find($req['productid']);
        $eliminarCarrito->delete();
        return redirect('carrito');
    }

    public function searchProduct(Request $req){
        $texto = $req['texto'];
        $busqueda = Product::where('name','LIKE','%'.$texto.'%')->get();
        return $busqueda;
    }

    public function searchProductPage($texto){
        //$texto = $req['texto'];
        $productos = Product::where('name','LIKE','%'.$texto.'%')->paginate(8);
        if (auth()->user()) {
            $user = User::find(auth()->user()->id);
            $productosAgregados = $user->products;
            $vac = compact('productos','productosAgregados');
            return view('pages.listado',$vac);
        }else{
            $productosAgregados = [];
            $vac = compact('productos','productosAgregados');
            return view('pages.listado',$vac);
        }
    }

    public function viewPerfil(){
        return view('pages.perfil');
    }
}
