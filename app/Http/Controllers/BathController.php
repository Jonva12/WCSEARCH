<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Aseo;
use Auth;

class BathController extends Controller
{
    public function __construct()
    {
        $this->middleware(array('auth', 'verified'));
    }

    public function form(){
      if(Auth::user()->role->nombre == 'normal'){
        return view('pages.home');
      }else{
        return view('pages.createWC');
      }
    }

    public function create(Request $request){

      $foto = $request->file('foto');
    //  Storage::disk('public')->put($foto->getFileName().'.'.$extension, File::get($foto));

      $aseo = new Aseo();
      $aseo->nombre = $request->input('nombre');
      $aseo->latitud = $request->input('latitud');
      $aseo->longitud = $request->input('longitud');
      $aseo->dir = $request->input('dir');
      $aseo->horarioApertura = $request->input('horarioApertura');
      $aseo->horarioCierre = $request->input('horarioCierre');
      $aseo->horas24 = $request->input('horas24');

      if($foto == ''){
        $aseo->foto = 'wc.jpg';
      }else{
        $extension = $foto->getClientOriginalExtension();
        $aseo->foto = $foto->getFileName(). '.' .$extension;
        $request->foto->storeAs('fotos', $foto->getFileName().'.'.$extension);
      }
      $aseo->precio = $request->input('precio');
      $aseo->accesibilidad = $request->input('accesibilidad');
      $aseo->user_id = Auth::user()->id;

      $aseo->save();
      return view('pages.fichaWC', ['aseo' => $aseo]);
    }

    public function ficha($id){
      $aseo = Aseo::find($id);
      return view('pages.fichaWC', ['aseo' => $aseo]);
    }

    public function ocultarAseo($id){
      $aseo = Aseo::find($id);
      $aseo->oculto = new \DateTime();
      $aseo->save();

      return redirect()->route('usuario');

    }
}
