<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class BaneoController extends Controller
{
    public function index(){
    	if (Auth::user()->fecha_de_baneo!=null){
    		return view('auth/baneo');
    	}
    	return redirect()->route('home');
    } 
}
