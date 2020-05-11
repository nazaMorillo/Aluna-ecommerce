<?php

use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\City;

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