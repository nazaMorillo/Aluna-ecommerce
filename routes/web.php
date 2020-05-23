<?php

//use App\Http\Middleware\CheckRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

use App\User;
//use App\Product;
use App\Country;
use App\State;
use App\City;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/nuevaCompra/{id}/{cant}', function ($id, $cant = 1){
    dd($id, $cant);
   return "Respuesta del endPoint";
});

Route::get('/logout', function () {
    return view('home');
});

Route::get('/productos/{id}', 'ProductController@showProduct');

// Route::get('/producto/{id}', function ($id) {
//     $vac = compact('id');
//     return view('pages.detalleProducto', $vac);
// });

Route::get('/listado', 'ProductController@show' );

Route::get('/listado/{texto}', 'UserController@searchProductPage' );

Route::get('/gestion', 'AjaxCrudController@getProducts')->middleware('auth','rol:user,admin');


/*Route::resource('/carrito/{id}/{idProducto}', 'UserController@addToCart' );*/


Route::post('/agregarProducto', 'UserController@addToCart');

Route::post('/eliminarProducto', 'UserController@dropToCart');

Route::get('/buscarProducto', 'UserController@searchProduct');

Route::get('/carrito', 'UserController@viewCart');
Route::get('/carrito2', 'UserController@viewCart');

Route::get('/perfil', 'UserController@viewPerfil');

// Route::get('/login', function () {
//     return view('pages.login');
// });

Route::get('/ayuda', function () {
    return view('pages.ayuda');
});

Route::get('/contacto', function () {
    return view('pages.contacto');
});


// Route::get('/registro', function () {
//     return view('pages.registro');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth','role:user,admin');

//Route::resource('ajaxproducts','ProductAjaxController');

/*Route::get('/admin', function (){
    return view('pages.admin');
})->name('admin'); // <--- este es el nombre que busca el controlador.*/

/*Route::get('/', function () {
    if( Auth::user() ) //se valida si esta logueado
        if( Auth::user()->rol =='admin' ) //se valida el tipo de usuario
            return redirect('/admin');
        else
            return redirect('/');
    else
        return redirect('/');
});*/

Route::resource('ajax-crud', 'AjaxCrudController')->middleware('auth', 'role:admin');

Route::post('ajax-crud/update', 'AjaxCrudController@update')->name('ajax-crud.update');

Route::get('ajax-crud/destroy/{id}', 'AjaxCrudController@destroy');
Route::post('/actualizarPerfil', 'UserController@updateInfo');

Route::get('/cantCarrito', function(){
    //$vac = $user->products()-get();
    $user = User::find(auth()->user()->id);
    $productos = $user->products()->orderBy('pivot_id','desc')->get();
    $vac = compact('productos');
    return count($vac['productos']);
});
