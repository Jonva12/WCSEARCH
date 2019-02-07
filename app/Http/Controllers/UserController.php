<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use Hash;
use App\Aseo;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(array('auth', 'verified','baneado'))->except('perfil');
    }
    public function index()
    {
        return view('pages.home');
    }

    public function ajustes(){
        return view('pages/user/ajustes');
    }

    public function perfil(Request $request, $id=-1){
        if($id==-1){
            $id=Auth::user()->id;
        }
    	$usuario=User::where('id',$id)->first();
        if (Auth::user()){
            if (Auth::user()->role->nombre!="admin"){
            if($usuario->role->nombre=="admin" || $usuario->fecha_de_baneo!=null){
                return redirect()->route('sinPermisos');
            }
        }
        }
        
        
        $aseos=Aseo::where('user_id', $id )->Where('oculto', '=', null);
        $aseos=Aseo::where([['user_id', $id],['oculto',null]]);
        $n=$request->input('nombre');
        if($n!=null && $n!=""){
          $aseos=$aseos->where('nombre', 'like', '%'.$n.'%');
        }
        $n=$request->input('direccion');
        if($n!=null && $n!=""){
          $aseos=$aseos->where('dir', 'like', '%'.$n.'%');
        }


		return view('pages/user/perfil', array('usuario'=>$usuario, 'aseos'=>$aseos->get()));
	}

    public function cambiarDatos(Request $request){
        $request->validate([
            'nombre'=>'string|required|min:2|max:255',
            'email'=>'email|required|min:6|max:255']);
        $usuario=User::where('id',Auth::user()->id)->first();
        $usuario->name=htmlentities($request->input('nombre'));
        $usuario->email=htmlentities($request->input('email'));
        $usuario->save();


        return redirect()->route('usuario');
    }

    public function cambiarPassword(Request $request){
        $request->validate([
            'passwordActual'=>'required',
            'passwordNueva'=>'required|min:6|max:255',
            'passwordNueva2'=>'required|min:6|max:255',]);

        $usuario=User::where('id',Auth::user()->id)->first();
        if (password_verify ( $request->input('passwordActual'), $usuario->password )){
            if ($request->input('passwordNueva')==$request->input('passwordNueva2')){

                $usuario->password=Hash::make($request->input('passwordNueva'));

                $usuario->save();
                return redirect()->route('usuario');
            }
        }
        return redirect()->route('usuario.ajustes')
                        ->withErrors(["Informacion incorrecta"]);
    }

    public function borrarCuenta(Request $request){
        $request->validate([
            'password'=>'required',]);
        $usuario=User::where('id',Auth::user()->id)->first();
        if (password_verify ( $request->input('password'), $usuario->password )){
            $usuario->delete();
            Auth::logout();
            return redirect('/');
        }
        return redirect()->route('usuario.ajustes')
                        ->withErrors(["Informacion incorrecta"]);

    }
}
