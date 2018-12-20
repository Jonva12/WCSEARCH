<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Aseo;
use App\ReportesAseos;
use App\Message;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
    	$usuarios=User::all()->count();
    	$aseos=Aseo::all()->count();
    	$message=Message::all()->count();
    	return view('pages/admin', array('usuarios' => $usuarios, 'aseos' => $aseos, 'message' => $message));
    }

    public function usuarios(){
		$usuarios=User::where('fecha_de_baneo', null)->get();
		return view('pages/admin/usuarios', array('usuarios'=>$usuarios));
	}
    public function banearUsuario($id){
        $usuario=Usuario::where('id',$id)->first();
		$usuario->baneado=new DateTime();
		$usuario->save();
        return $this->usuarios();
    }

	public function aseos(){
		$aseos=Aseo::where('oculto', null)->get();
		return view('pages/admin/aseos', array('aseos'=>$aseos));
	}
	public function aseosOcultos(){
		$aseos=Aseo::where('oculto', '!=', null)->get();
		return view('pages/admin/aseos', array('aseos'=>$aseos));
	}

	public function aseo($id){
		$aseo=Aseo::where('id',$id)->first();
		return view('pages/admin/aseo', array('aseo'=>$aseo));
	}

	public function ocultarAseo($id){
		$aseo=Aseo::where('id',$id)->first();
		$aseo->oculto=new DateTime();
		$aseo->save();
		return $this->aseos();
	}

    public function eliminarAseo($id){
        Aseo::where('id',$id)->delete();
        return $this->aseos();
    }

	public function mensajes(){
		$mensajes=Message::all();
		return view('pages/admin/mensajes', array('mensajes'=>$mensajes));
	}
	public function eliminarMensaje($id){
        Message::where('id',$id)->delete();
        return $this->mensajes();
    }
}