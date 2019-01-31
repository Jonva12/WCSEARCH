<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aseo;

class ApiAseosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $aseos=Aseo::where('oculto',null)
        ->whereBetween('latitud',[$request->latitud-0.05,$request->latitud+0.05])
        ->whereBetween('longitud',[$request->longitud-0.05,$request->longitud+0.05])->get();

      return $aseos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $aseo=Aseo::where(
        'id',$id
      )->first();
      $aseo->numPuntuacion=$aseo->valoracion()->sum('aseos_users.puntuacion');
      $aseo->countPuntuacion=$aseo->valoracion()->count();

      return $aseo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
