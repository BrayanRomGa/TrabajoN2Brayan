<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

                            //COMENTARIOS
Route::get('/comentarios/{id?}','API\ComentariosController@ShowComentarios')->where("id","[0-9]+");
Route::post('/comentarios/{id?}','API\ComentariosController@saveComentarios');
Route::put('/comentarios/{id?}','API\ComentariosController@editComentarios')->where("id","[0-9]+");
Route::delete('/comentarios/{id?}','API\ComentariosController@deleteComentarios')->where("id","[0-9]+");


                            //PERSONAS
Route::get("/personas/{id?}","API\PersonasController@showPersonas")->where("id","[0-9]+");  //no funciona de esta manera
Route::post("/personas/{id?}",'API\PersonasController@savePersonas');
Route::put("/personas/{id?}",'API\PersonasController@editPersonas')->where("id","[0-9]+");
Route::delete("/personas/{id?}",'API\PersonasController@deletePersonas')->where("id","[0-9]+");


                            //PRODUCTOS
Route::get('/productos/{id?}','API\ProductosController@showProductos')->where("id","[0-9]+");
Route::post("/productos/{id?}",'API\ProductosController@saveProductos');
Route::put('/productos/{id?}','API\ProductosController@editProductos')->where("id","[0-9]+");
Route::delete('/productos/{id?}','API\ProductosController@deleteProductos')->where("id","[0-9]+");
