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
		$usuarios=User::all();
		return view('pages/admin/usuarios', array('usuarios'=>$usuarios));
	}
    public function eliminarUsuario($id){
        User::where('id',$id)->delete();
        return $this->usuarios();
    }

	public function aseos(){
		$aseos=Aseo::all();
		return view('pages/admin/aseos', array('aseos'=>$aseos));
	}

	public function aseo($id){
		$aseo=Aseo::where('id',$id)->first();
		return view('pages/admin/aseo', array('aseo'=>$aseo));
	}
    public function eliminarAseo($id){
        Aseo::where('id',$id)->delete();
        return $this->aseos();
    }

	public function mensajes(){
		$mensajes=Message::all();
		return view('pages/admin/mensajes', array('mensajes'=>$mensajes));
	}
}
