<?php

use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\City;
use App\Product;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getPaisesProvinciasLocalidades', function (){
    $paises = Country::orderBy('pais')->get();
    $provincias = State::orderBy('provincia')->get();
    $localidades = City::orderBy('localidad')->get();
    $vac = compact('paises','provincias','localidades');
    
    return $vac;
});

Route::get('/nuevaCompra/{id}/{cant}', function ($id, $cant = 1){
     dd($id, $cant);
    // $input = $req->all();

    // $findMovie = \App\Pelicula::find($input['id']);
    // if($input['id'] == $findMovie->id){
    //     $pelicula = $findMovie;
    // }else{
    //     $pelicula = new \App\Pelicula();
    // }
    // $pelicula->poster = $input['title'].".jpg";
    // $pelicula->title = $input['title'];
    // $pelicula->rating = $input['rating'];
    // $pelicula->awards = $input['awards'];
    // $pelicula->release_date = $input['release_date'];

    // $pelicula->save();

    // return response(['status' => 'ok','mensaje' =>'Se ha guardado correctamente la pelicual '.$pelicula->title, 'pelicula' => $pelicula], 201);
        //$vac = compact('id', 'cant');
    return "Respuesta del endPoint";
});

// Route::get('products', function(){
//     return datatables()
//     ->eloquent(Product::query())
//     ->toJson();

// });

Route::get('products', function(){
    return datatables()->of(Product::latest()->get())
                    ->addColumn('action', function($data){
                        $btnsAction = '
                        <div class="d-flex flex-column justify-content-between">
                        <button type="button" name="edit" id="'.$data->id.'" class="m-1 edit btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                        <button type="button" name="delete" id="'.$data->id.'" class="m-1 delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i>
                        </button>
                        </div>';
                        return $btnsAction;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
});

//Route::get('/products', 'AjaxCrudController@getProducts')->middleware('auth','rol:user,admin');
