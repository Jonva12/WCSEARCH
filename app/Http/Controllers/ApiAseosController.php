<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aseo;
use App\ReportesAseos;
use App\Notification;
use App\User;
use Auth;

class ApiAseosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $aseos=Aseo::where('oculto',null)->get();

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

    public function reportar(Request $request, $id){
        $reporte=new ReportesAseos();
        $reporte->tipo=htmlentities($request->tipo);
        $reporte->comentario=htmlentities($request->comentario);
        $reporte->aseo_id=$id;

        $aseo=Aseo::find($id);

        $n=new Notification;
        $n->tipo="aseoReportado";
        $n->para=$aseo->user_id;
        $n->aseo_id=$aseo->id;
        $n->save();

        $reporte->save();
    }

    public function valorar(Request $request, $id){
      $voto = $request->voto;
      $aseo=Aseo::where('id', $id)->first();

      if (Auth::user()->id!=$aseo->user_id && !$aseo->valoracion()->where('user_id',Auth::user()->id)->first()){
         $u=new UserController;
          $u->sumarPuntos(Auth::user()->id,5);
          $u->sumarPuntos($aseo->user_id,10);

      }
     
      $aseo->valoracion()->detach(Auth::user());
      $aseo->valoracion()->attach(Auth::user(), ['puntuacion' => $voto]);

      $aseo->numPuntuacion=$aseo->valoracion()->sum('aseos_users.puntuacion');
      $aseo->countPuntuacion=$aseo->valoracion()->count();

      if(Auth::user()->id!=$aseo->user_id){
        $n=new Notification;
        $n->tipo="aseoValorado";
        $n->de=Auth::user()->id;
        $n->para=$aseo->user_id;
        $n->aseo_id=$aseo->id;
        $n->save();
      }
      return $aseo;
    }
}
