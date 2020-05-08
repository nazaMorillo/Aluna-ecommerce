<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;

class ProductController extends Controller
{
    public function show (){
        $productos= Product::paginate(8);

        if (auth()->user()) {
            $user = User::find(auth()->user()->id);
            $productosAgregados = $user->products;
            $vac = compact('productos','productosAgregados');
            return view('pages.listado', $vac);
        }else{
            $productosAgregados = [];
            $vac = compact('productos','productosAgregados');
            return view('pages.listado', $vac);
        }

    }

    public function showProduct ($id){
        $user = User::find(auth()->user()->id);
        $producto = Product::find($id);
        $productosAgregados = $user->products;
        $vac = compact("producto","productosAgregados");
        return view('pages.detalleProducto', $vac);
    }
}
