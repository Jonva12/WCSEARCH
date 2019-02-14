<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;
use Auth;
use App\User;
use Carbon\Carbon;
use App\Notification;
use App\Aseo;

class ApiComentariosController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api')->except('show');
    }
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
    public function store(Request $request, $id)
    {
        $request->validate([
        'text' => 'required|min:1|max:140',
        ]);
        if (Auth::user()){
            $comentario= new Comentario;
            $comentario->text=htmlentities($request->input('text'));
            $comentario->user_id=Auth::user()->id;
            $comentario->aseo_id=$id;
            $comentario->save();
            
            $aseo=Aseo::find($id);
            if (Auth::user()->id!=$aseo->user_id){
                $u=new UserController;
                $u->sumarPuntos(Auth::user()->id,5);
           
                $n=new Notification;
                $n->tipo="aseoComentado";
                $n->de=Auth::user()->id;
                $n->para=$aseo->user_id;
                $n->aseo_id=$aseo->id;
                $n->save();
            }

        }

        return $comentario;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         Auth::shouldUse('api');
        if (Auth::user()){
            $comentarios=Comentario::where([['aseo_id',$id],['user_id','!=',Auth::user()->id]])->orderBy("created_at", 'desc')->get();
        }else{
            $comentarios=Comentario::where([['aseo_id',$id]])->orderBy("created_at", 'desc')->get();
        }
        foreach ($comentarios as $c) {
            $aux=$c->usuario->name;
            $c->like=$c->valoracion()->where('comentarios_users.puntuacion',1)->count();
            $c->dislike=$c->valoracion()->where('comentarios_users.puntuacion',-1)->count();
            Carbon::setLocale('es');
            $c->time=Carbon::parse($c->created_at)->diffForHumans();
        }

        return $comentarios;
    }

    public function showMio($id)
    {
        if (Auth::user()!==null){

            $comentarios=Comentario::where([['aseo_id',$id],['user_id',Auth::user()->id]])->orderBy("created_at", 'desc')->get();
            foreach ($comentarios as $c) {
                $aux=$c->usuario->name;
                $c->like=$c->valoracion()->where('comentarios_users.puntuacion',1)->count();
                $c->dislike=$c->valoracion()->where('comentarios_users.puntuacion',-1)->count();
                Carbon::setLocale('es');
                $c->time= Carbon::parse($c->created_at)->diffForHumans();
            }

            return $comentarios;
        }else{
            return null;
        }
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
        Comentario::where([['id', $id],['user_id', Auth::user()->id]])->first()->valoracion()->detach();

        Comentario::where([['id', $id],['user_id', Auth::user()->id]])->delete();
        return 1;
    }

    public function valorar(Request $request, $id)
    {

        //$u=User::where('id', Auth::user()->id)->first();
        $v=$request->voto=="true"?1:-1;
        $comentario=Comentario::where('id',$id)->first();
        
        if (Auth::user()->id!=$comentario->user_id && $v==1 && !$comentario->valoracion()->where('user_id',Auth::user()->id)->first()){
            $u=new UserController;
            $u->sumarPuntos(Auth::user()->id,5);
            $u->sumarPuntos($comentario->user_id,10);
        }

        $comentario->valoracion()->detach(Auth::user());
        $c=Comentario::where('id',$id)->first()->valoracion()->attach(Auth::user(),['puntuacion'=>$v]);

        $aseo=Aseo::find($comentario->aseo_id);

        if (Auth::user()->id!=$comentario->user_id){
            $n=new Notification;
            $n->tipo="comentarioValorado";
            $n->de=Auth::user()->id;
            $n->para=$comentario->user_id;
            $n->aseo_id=$aseo->id;
            $n->save();
        }

        return 1;
    }

    

}
