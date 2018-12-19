<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Aseo;
use App\Message;
use App\ReportesAseos;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(array('auth','verified'));
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

	public function aseos(){
		$aseos=Aseo::all();
		return view('pages/admin/aseos', array('aseos'=>$aseos));
	}

	public function reportesAseos(){
		$reportes=ReportesAseo::all();
		return view('pages/admin/reportesAseos', array('reportes'=>$reportes));
	}

	public function mensajes(){
		$mensajes=Message::all();
		return view('pages/admin/mensajes', array('mensajes'=>$mensajes));
	}
}
