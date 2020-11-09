<?php
namespace App\Http\Controllers\Files;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use app\Mail\SendEmail;         //hacer la referencia al archivo
class FilesController extends Controller
{
    public function SaveFile(Request $request){
        //if($request->hasFile('file')) {  //verifica si hay un archivo
            //$extension=$request->file('file')->extension();//obtiene la extencion del archivo
            //$path=Storage::putFileAs('documentos/pdf','$request->file,$request->name.".".$extension');
            //$path=Storage::disc('local')->put('docPrivados/ejeGuaArchivos', $request->file);
            //$files = Storage::allFiles('Storage');
            //return Storage::download('storage/EjeGuaArchivos'); //muestra el archivo
            return response()->json(["path"=>$files],201);
        //}                   //nombreArchivo   ruta donde se guardo
        return response()->json(null,456);
    }

    public function SendEmail(){
        $mail=Mail::to('19170141@uttcampus.edu.mx')->send(new SendEmail());
        return response()->json(["Email"=>$mail],200);
    }
}