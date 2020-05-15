<?php

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

use App\Country;
use App\State;
use App\City;

Route::get('/', function () {
    return view('home');
});

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

/*Route::get('/carrito/{id}/{idProducto}', 'UserController@addToCart' );*/

Route::post('/agregarProducto', 'UserController@addToCart');

Route::post('/eliminarProducto', 'UserController@dropToCart');

Route::get('/buscarProducto', 'UserController@searchProduct');

Route::get('/carrito', 'UserController@viewCart');

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

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/actualizarPerfil', 'UserController@updateInfo');