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
Route::get("/personas/{id?}","API\PersonasController@showPersonas")->where("id","[0-9]+");
Route::post("/personas/{id?}",'API\PersonasController@savePersonas')->middleware('checar.edad');// solo se aplucara en esta rama al registrarse
Route::put("/personas/{id?}",'API\PersonasController@editPersonas')->where("id","[0-9]+");
Route::delete("/personas/{id?}",'API\PersonasController@deletePersonas')->where("id","[0-9]+");


                            //PRODUCTOS
Route::get('/productos/{id?}','API\ProductosController@showProductos')->where("id","[0-9]+");
Route::post("/productos/{id?}",'API\ProductosController@saveProductos');
Route::put('/productos/{id?}','API\ProductosController@editProductos')->where("id","[0-9]+");
Route::delete('/productos/{id?}','API\ProductosController@deleteProductos')->where("id","[0-9]+");


                            //prueba edad
//Route::post('edad',['middleware'=>'checar.edad','API\verifyAge@verifyAge']);
                        //ruta normal      //aqui se aplica el middleware
Route::post('/edad','API\verifyAge@verifyAge')->middleware('checar.edad'); 
//las 2 diferentes formas de llamar al middleware


//middleware con token
Route::middleware('auth:sanctum')->get('admon','Auth\AuthController@admon');
Route::middleware('auth:sanctum')->post('admonUsuNew','Auth\AuthController@admonUsuNew');

Route::middleware('auth:sanctum')->get('user','Auth\AuthController@user');

Route::middleware('auth:sanctum')->delete('logOut','Auth\AuthController@logOut');
//prueba token
Route::post('/registro','Auth\AuthController@registro')->middleware('checar.edad'); 
Route::post('/logIn','Auth\AuthController@logIn');

//control basico de archivos
Route::post('/files','API\FilesController@SaveFile');//SendEmail
Route::post('/email','API\FilesController@SendEmail');//SendEmail