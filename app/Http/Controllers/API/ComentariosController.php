<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\modelos\comentario; //que no se te olvide poner estas cosas, son la parte de los enlaces

class ComentariosController extends Controller
{
    public function ShowComentarios($id=null){
        if($id)
            return response()->json(["Comentario"=>comentario::find($id)],200);
        return response()->json(["Comentarios"=>comentario::all()],200);
    }
    public function saveComentarios(Request $request){
        $guardComentarios=new comentario();
        $guardComentarios->comentario=$request->comentario;
        $guardComentarios->id_persona=$request->id_persona;
        $guardComentarios->id_producto=$request->id_producto;

        if($guardComentarios->save())
            return response()->json(["Comentario"=>$guardComentarios],201);
        return response()->json(null,400);
    }

    public function editComentarios(Request $request, $id){
        $guardComentarios=new comentario();
        $guardComentarios=comentario::find($id);

        $guardComentarios->comentario=$request->comentario;
        $guardComentarios->id_persona=$request->id_persona;
        $guardComentarios->id_producto=$request->id_producto;

        if($guardComentarios->update())
            return response()->json(["Comentario"=>$guardComentarios],201);
        return response()->json([null,400]);
    }
    public function deleteComentarios($id=null){
        $guardComentarios=new comentario();     //linea agregada de prueba
        $guardComentarios=comentario::find($id);
        if($guardComentarios->delete())
            return response()->json(["Comentario"=>comentario::all()],201);
        return response()->json([null,400]);
    }

   
}