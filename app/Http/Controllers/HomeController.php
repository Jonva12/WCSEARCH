<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Aseo;

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
            if(Auth::user()->role->nombre=="admin" && $request->input('idAseo')==null){
                return redirect()->route('admin');
            }
        }
        if ($request->input('idAseo')!=null){
            $aseo=Aseo::select('id', 'latitud', 'longitud')->where('id', $request->input('idAseo'))->first();
            return view('pages.home',['idAseo'=> $aseo->id, 'latitud'=>$aseo->latitud,'longitud' => $aseo->longitud]); 
        }
        
        return view('pages.home');
    }
}
