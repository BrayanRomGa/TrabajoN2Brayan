<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\User;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validatos;
class AuthController extends Controller
{
    //informacion siendo admon
    public function admon(Request $request)
    {
        if($request->user()->tokenCan('Usuario') && $request->user()->tokenCan('Admon'))
            return response()->json(["Eres admon"=>User::all()],200);
        abort(401,"Scope invalido");
    }
        //informacion siendo usuario normal
    public function user(Request $request)
    {
        if($request->user()->tokenCan('Usuario'))
            return response()->json(["Tu Perfil"=> $request->user()],200);
        abort(401,"Scope invalido");
    }

                    //cerrar secion
    public function logOut(Request $request)
    {
        return response()->json(["afectados"=>$request->user()->tokens()->delete()],266);
    }
    //iniciar secion( registrar usuario normal)
    public function logIn(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user = User::where('email',$request->email)->first();

        if(!$user||!Hash::check($request->password,$user->password)){
            throw ValidationException::withMessages([      //ValidationException es el Accept en el header de insomnia
                'email|password'=>['Credenciales incorrectas..'],
            ]);
        }
        $token=$user->createToken($request->email,['Usuario'])->plainTextToken;
        return \response()->json(["token"=>$token],201);
    }

//aqui se registra un administrador con la ayuda de otro administrador
    public function admonUsuNew(Request $request)
    {               //con esto verifico las credenciales del admon
        if($request->user()->tokenCan('Usuario') && $request->user()->tokenCan('Admon'))
        {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user = User::where('email',$request->email)->first();

        if(!$user||!Hash::check($request->password,$user->password)){
            throw ValidationException::withMessages([      //ValidationException es el Accept en el header de insomnia
                'email|password'=>['Credenciales incorrectas..'],//
            ]);
        }
        $token=$user->createToken($request->email,['Admon'])->plainTextToken;
        return \response()->json(["token"=>$token],201);
    }else{    
        abort(401,"Scope invalido");
    }
}
                //aqui se registra la persona
    public function registro(Request $request)
    {
        $request->validate([
        'name'=>'required',
        'edad'=>'required',
        'email'=>'required|email',
        'password'=>'required',
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->edad=$request->edad;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);

        if($user->save())
            return response()->json($user,205);
        return abort(422,"fallo al insertar");
    }
}