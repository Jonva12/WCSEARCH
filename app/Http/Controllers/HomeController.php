<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()){
            if(Auth::user()->role->nombre=="admin" && $request->input('latitud')==null && $request->input('longitud')==null){
                return redirect()->route('admin');
            }
        }
        if ($request->input('latitud')!=null && $request->input('longitud')!=null){
            return view('pages.home',['latitud'=>$request->input('latitud'),'longitud' => $request->input('longitud')]); 
        }
        
        return view('pages.home');
    }
}
