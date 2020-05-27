<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Cart;
use App\Brand;
use App\Category;

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

    public function addToCart(Request $req)
    {
        $agregarACarrito = new Cart();
        $agregarACarrito->user_id = auth()->user()->id;
        $agregarACarrito->product_id = $req['productid'];
        $agregarACarrito->save();
        return redirect('/listado');
    }

    public function viewCart()
    {
        $user = User::find(auth()->user()->id);
        $productos = $user->products()->orderBy('pivot_id', 'desc')->get();
        $vac = compact('productos');
        return view('pages.carrito', $vac);
    }

    public function dropToCart(Request $req)
    {
        $idusuario = auth()->user()->id;
        $eliminarCarrito = Cart::find($req['productid']);
        $eliminarCarrito->delete();
        return redirect('carrito');
    }

    public function dropAllCart()
    {
        $mensaje = "Acá también está todo bien";

        $idusuario = auth()->user()->id;

        $productosDelCarrito = Cart::where('user_id', '=', $idusuario)->get();
        foreach ($productosDelCarrito as $producto) {
            $producto->delete();
        }        
        return redirect('/carrito');
    }

    public function searchProduct(Request $req)
    {
        $texto = $req['texto'];
        $busqueda = Product::where('name','LIKE','%'.$texto.'%')->skip(0)->take(8)->get();
        $cantidad = Product::where('name','LIKE','%'.$texto.'%')->get();
        $response = [$busqueda,count($cantidad)];
        return $response;
    }

    public function searchProductPage($texto)
    {
        //$texto = $req['texto'];
        $productos = Product::where('name', 'LIKE', '%' . $texto . '%')->paginate(8);
        if (auth()->user()) {
            $user = User::find(auth()->user()->id);
            $productosAgregados = $user->products;
            $vac = compact('productos', 'productosAgregados');
            return view('pages.listado', $vac);
        } else {
            $productosAgregados = [];
            $vac = compact('productos', 'productosAgregados');
            return view('pages.listado', $vac);
        }
    }

    public function viewPerfil()
    {
        return view('pages.perfil');
    }

    public function updateInfo(Request $req)
    {
        $user = User::find(auth()->user()->id);
        if (password_verify($req["userpassword"], $user->password)) {
            if (strlen($req["username"]) > 0) {
                $user->name = $req["username"];
            }
            if (strlen($req["usersecondname"]) > 0) {
                $user->surname = $req["usersecondname"];
            }
            if (isset($req["userimage"])) {
                $imagen = public_path() . "\\storage\\" . $user->avatar;
                if (@getimagesize($imagen)) {
                    unlink($imagen);
                }
                $ruta = request()->file('userimage')->store('public');
                $avatar = explode("/", $ruta)[1];
                $user->avatar = $avatar;
            }
            $user->save();
            return redirect("perfil");
        } else {
            return redirect("perfil");
        }
    }

    public function agregarDeslogueado(Request $req)
    {
        $id = $req['id'];
        session_start();
        $_SESSION['Producto'] = $id;
        return $_SESSION['Producto'];
    }

    public function agregarSiNoCart(Request $req){
        $bandera = true;
        $id = $req['productid'];
        $user = User::find(auth()->user()->id);
        $productosAgregados = $user->products;
        foreach($productosAgregados as $producto){
            if($producto->id == $id){
                $bandera = false;
            }
        }
        $response = $bandera ? 'true' : 'false';        
        return $response;
    }

    public function obtenerMarcasyCategorias(){
        $response = [];
        array_push($response,Brand::all());
        array_push($response,Category::all());
        return $response;
    }

    public function busquedaAvanzada(Request $req){
        $marca = $req['marcaSeleccionada'];
        $categoria = $req['categoriaSeleccionada'];
        if($marca == -1 && $categoria == -1){
            $productos = Product::paginate(8);
        }elseif($marca == -1){
            $productos = Product::where('category','=',$categoria)->paginate(8);
        }elseif($categoria == -1){
            $productos = Product::where('brand','=',$marca)->paginate(8);
        }else{
            $productos = Product::where('brand','=',$marca)->where('category','=',$categoria)->paginate(8);
        }        
        if(auth()->user()) {
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
}
