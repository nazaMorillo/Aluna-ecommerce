<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function show (){
        $productos= Product::paginate(8);

        $vac = compact("productos");

        return view('pages.listado', $vac);
    }

    public function showProduct ($id){
        $producto= Product::find($id);
        $vac = compact("producto");

        return view('pages.detalleProducto', $vac);
    }
}