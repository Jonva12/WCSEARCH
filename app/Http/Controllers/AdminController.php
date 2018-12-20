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

    //USUARIOS
    public function usuarios($baneados = false){
        if ($baneados){
            $usuarios=User::where('fecha_de_baneo', '!=', null)->get();
        }else{
            $usuarios=User::where('fecha_de_baneo', null)->get();
        }
		
		return view('pages/admin/usuarios', array('usuarios'=>$usuarios, 'baneados'=>$baneados));
	}
    
    public function banearUsuario($id){
        $usuario=User::where('id',$id)->first();
        $usuario->fecha_de_baneo=new \DateTime();
        $usuario->save();
        return redirect()->route('admin.usuarios');
    }

    public function desbanearUsuario($id){
        $usuario=User::where('id',$id)->first();
        $usuario->fecha_de_baneo=null;
        $usuario->save();
        return redirect()->route('admin.usuarios');
    }

    //ASEOS
	public function aseos($ocultos = false){
        if ($ocultos){
            $aseos=Aseo::where('oculto', '!=', null)->get();
        }else{
            $aseos=Aseo::where('oculto', null)->get();
        }
		
		return view('pages/admin/aseos', array('aseos'=>$aseos, 'ocultos' => $ocultos));
	}

	public function aseo($id){
		$aseo=Aseo::where('id',$id)->first();
		return view('pages/admin/aseo', array('aseo'=>$aseo));
	}

	public function ocultarAseo($id){
		$aseo=Aseo::where('id',$id)->first();
		$aseo->oculto=new \DateTime();
		$aseo->save();
		return redirect()->route('admin.aseos');
	}

    public function mostrarAseo($id){
        $aseo=Aseo::where('id',$id)->first();
        $aseo->oculto=null;
        $aseo->save();
        return redirect()->route('admin.aseos');
    }

    public function eliminarAseo($id){
        Aseo::where('id',$id)->delete();
        return redirect()->route('admin.aseos');
    }

    //MENSAJES
	public function mensajes(){
		$mensajes=Message::all();
		return view('pages/admin/mensajes', array('mensajes'=>$mensajes));
	}
	public function eliminarMensaje($id){
        Message::where('id',$id)->delete();
        return redirect()->route('admin.mensajes');
    }
}