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





Route::get('/', function () {
    return view('home');
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

Route::get('/home', 'HomeController@index')->middleware('role:user');





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
Route::view('/admin', 'pages.admin');