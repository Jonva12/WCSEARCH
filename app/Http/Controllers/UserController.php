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

    public function perfil($id=-1){
        if($id==-1){
            $id=Auth::user()->id;
        }
    	$usuario=User::where('id',$id)->first();
		return view('pages/user/perfil', array('usuario'=>$usuario));
	}
}
