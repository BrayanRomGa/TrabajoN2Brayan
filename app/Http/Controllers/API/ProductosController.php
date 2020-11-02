<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\modelos\producto;
class ProductosController extends Controller
{
    public function showProductos($id=null){
        if($id)
           return response()->json(["producto"=>producto::find($id)],200);
        return response()->json(["productos"=>producto::all()],200);
    }
    public function saveProductos(Request $request){
        $guardproductos=new producto();
        $guardproductos->nombreProducto=$request->nombreProducto;
        $guardproductos->precio=$request->precio;

        if($guardproductos->save())
            return response()->json(["Productos"=>$guardproductos],201);
        return response()->json(null,400);
    }
    public function editProductos(Request $request, $id){
        $guardproductos=new producto();
        $guardproductos=producto::find($id);

        $guardproductos->nombreProducto = $request->nombreProducto;
        $guardproductos->precio = $request->precio;

        if($guardproductos->update())
            return response()->json(["Productos"=>$guardproductos],201);
        return response()->json([null,400]);
    }
    public function deleteProductos($id=null){
        $guardproductos=new producto();             //linea agregada de prueba
        $guardproductos=producto::find($id);
        if($guardproductos->delete())
            return response()->json(["Productos"=>producto::all()],200);
        return response()->json([null,400]);
    }
}