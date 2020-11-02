<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\modelos\persona;
class PersonasController extends Controller
{
    public function showPersonas($id=null){
        if($id)
           return response()->json(["Persona"=>persona::find($id)],200);
        return response()->json(["Personas"=>persona::all()],200);
        //return Persona::all();   //lo mismo de arriba
    }
    public function savePersonas(Request $request){
        $guardpersonas=new persona();
        $guardpersonas->nombre=$request->nombre;
        $guardpersonas->apellido=$request->apellido;
        $guardpersonas->nomUsuario=$request->nomUsuario;
        $guardpersonas->contrasena=$request->contrasena;

        if($guardpersonas->save())
            return response()->json(["Personas"=>$guardpersonas],201);
        return response()->json(null,400);
    }

    public function editPersonas(Request $request, $id){
        $guardpersonas=new persona();
        $guardpersonas=persona::find($id);

        $guardpersonas->nomUsuario=$request->nomUsuario;
        $guardpersonas->contrasena=$request->contrasena;

        if($guardpersonas->update())
            return response()->json(["Personas"=>$guardpersonas],201);
        return response()->json([null,400]);
    }
    public function deletePersonas($id=null){
        $guardpersonas=persona::find($id);
        if($guardpersonas->delete())
            return response()->json(["Personas"=>persona::all()],200);
        return response()->json([null,400]);
    }
    
}