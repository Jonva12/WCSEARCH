<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(array('auth', 'verified'));
    }

    public function index(){
    	return view('pages/user');
    }

    public function perfil($id){
    	$usuario=User::where('id',$id)->first();
		return view('pages/user/perfil');
	}
}
