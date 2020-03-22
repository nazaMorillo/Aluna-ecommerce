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

Route::get('/', function () {
    return view('home');
});

Route::get('/logout', function () {
    return view('home');
});

Route::get('/producto/{id}', 'ProductController@showProduct');

// Route::get('/producto/{id}', function ($id) {
//     $vac = compact('id');
//     return view('pages.detalleProducto', $vac);
// });

Route::get('/listado', 'ProductController@show' );

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
