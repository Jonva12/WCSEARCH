<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;
use Auth;
use App\User;

class ApiComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return null;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dump($request);
        $comentario= new Comentario;
        $comentario->text=$request->text;
        $comentario->user_id=$request->userId;
        $comentario->aseo_id=$request->aseoId;
        $comentario->save();

        $user=User::where('id', $request->userId)->first();
        $user->puntuacion+=2;
        $user->save();
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comentarios=Comentario::where('aseo_id',$id)->orderBy("created_at", 'desc')->get();
        foreach ($comentarios as $c) {
            $aux=$c->usuario->name;
            $c->like=$c->valoracion()->where('comentarios_users.puntuacion',1)->count();
            $c->dislike=$c->valoracion()->where('comentarios_users.puntuacion',-1)->count();
        }

        return $comentarios;
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
        Comentario::where('id',$id)->delete();
        return 1;
    }

    public function valorar(Request $request, $id)
    {
        $u=User::where('id', $request->userId)->first();
        $v=$request->voto=="true"?1:-1;

        $comentario=Comentario::where('id',$id)->first()->valoracion()->detach($u);

        $c=Comentario::where('id',$id)->first()->valoracion()->attach($u,['puntuacion'=>$v]);

        return 1;
    }

}
