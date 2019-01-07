<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(array('auth', 'verified'));
    }

    public function index(){
    	$usuario=Auth::user();
    	return view('pages/user', array('usuario'=>$usuario));
    }

    public function perfil($id){
    	$usuario=User::where('id',$id)->first();
		return view('pages/user/perfil', array('usuario'=>$usuario));
	}
}
