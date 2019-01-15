<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Aseo;
use Auth;

class BathController extends Controller
{
    // public function store(Request $request){
    //
    //   request()->validate([
    //     'nombre'->'required',
    //     'dir'->'required'
    //   ]);
    //
    //   $foto = $request->file('foto');
    //   $extension = $foto->getClientOriginalExtension();
    //   Storage::disk('public')->put($foto->getFileName().'.'.$extension, File::get($foto));
    //
    //   $aseo = new Aseo([
    //     $aseo->nombre = $request->input('nombre'),
    //     $aseo->localizacion = $request->input('localizacion'),
    //     $aseo->dir = $request->input('dir'),
    //     $aseo->horarioApertura = $request->input('horarioApertura'),
    //     $aseo->horarioCierre = $request->input('horarioCierre'),
    //     $aseo->horas24 = $request->input('horas24'),
    //     $aseo->mime = $foto->getClientMimeType(),
    //     $aseo->original_foto = $foto->getClientOriginalName(),
    //     $aseo->foto = $foto->getFileName(). '.' .$extension,
    //     $aseo->precio = $request->input('precio'),
    //     $aseo->accesibilidad = $request->input('accesibilidad'),
    //   ]);
    //
    //   $aseo->save();
    //
    //   return redirect()->route('/fichaWC')->with('aseo');
    // }

    public function create(Request $request){

      $foto = $request->file('foto');
    //  Storage::disk('public')->put($foto->getFileName().'.'.$extension, File::get($foto));

      $aseo = new Aseo();
      $aseo->nombre = $request->input('nombre');
      $aseo->longitud = $request->input('longitud');
      $aseo->latitud = $request->input('latitud');
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

    public function getAseos(Request $request){
      $aseos=Aseo::whereBetween('latitud',[$request->latitud-0.05,$request->latitud+0.05])->whereBetween('longitud',[$request->longitud-0.05,$request->longitud+0.05])->get();
      return $aseos;
    }
}
