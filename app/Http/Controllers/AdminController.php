<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Aseo;
use App\ReportesAseos;
use App\Message;
use App\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(array('admin','auth', 'verified','baneado'));
    }

    public function index(Request $request){
    	$usuarios=User::all()->count();
    	$aseos=Aseo::all()->count();
    	$message=Message::all()->count();
        $lineas=array();

        if($request->input('year')!=null){
            for ($i=1;$i<13;$i++){
                $linea=DB::table('users')->whereYear('created_at', $request->input('year'))->whereMonth('created_at',$i)->count();
                $linea2=DB::table('aseos')->whereYear('created_at', $request->input('year'))->whereMonth('created_at',$i)->count();
                array_push($lineas,['mes'=>$i,'usuarios'=>$linea,'aseos'=>$linea2]);
            }
        }else{
            for ($i=1;$i<13;$i++){
                $linea=DB::table('users')->whereYear('created_at', 2019)->whereMonth('created_at',$i)->count();
                $linea2=DB::table('aseos')->whereYear('created_at', 2019)->whereMonth('created_at',$i)->count();
                array_push($lineas,['mes'=>$i,'usuarios'=>$linea,'aseos'=>$linea2]);
            }
        }


    	return view('pages/admin', array('usuarios' => $usuarios, 'aseos' => $aseos, 'message' => $message, 'lineas'=>$lineas));
    }

    //USUARIOS
    public function usuarios(Request $request){
        if ($request->input('baneados')=="on"){
            $usuarios=User::where('fecha_de_baneo', '!=', null);
        }else{
            $usuarios=User::where('fecha_de_baneo', null);
        }
        $n=$request->input('nombre');
        if($n!=null && $n!=""){
          $usuarios=$usuarios->where('name', 'like', '%'.$n.'%');
        }
        $n=$request->input('email');
        if($n!=null && $n!=""){
          $usuarios=$usuarios->where('email', 'like', '%'.$n.'%');
        }
        $n=$request->input('rol');
        if($n!=null && $n!="" && $n!=0 && $n!="0"){
          $usuarios=$usuarios->where('role_id', $n);
        }


		return view('pages/admin/usuarios', array('usuarios'=>$usuarios->get(), 'baneados'=>$request->input('baneados')=="on"));
	}

    public function banearUsuario($id){
        $usuario=User::where('id',$id)->first();
        $usuario->fecha_de_baneo=new \DateTime();
        $usuario->save();
        return redirect()->route('admin.usuarios');
    }

    public function desbanearUsuario($id){
        $usuario=User::where('id',$id)->first();
        $usuario->fecha_de_baneo=null;
        $usuario->save();
        return redirect()->route('admin.usuarios');
    }

    //ASEOS
	public function aseos(Request $request){
        if ($request->input('ocultos')=="on"){
            $aseos=Aseo::where('oculto', '!=', null);
        }else{
            $aseos=Aseo::where('oculto', null);
        }
        $n=$request->input('nombre');
        if($n!=null && $n!=""){
          $aseos=$aseos->where('nombre', 'like', '%'.$n.'%');
        }
        $n=$request->input('direccion');
        if($n!=null && $n!=""){
          $aseos=$aseos->where('dir', 'like', '%'.$n.'%');
        }

		return view('pages/admin/aseos', array('aseos'=>$aseos->get(), 'ocultos' => $request->input('ocultos')=="on"));
	}

	public function aseo($id){
		$aseo=Aseo::where('id',$id)->first();
		return view('pages/admin/aseo', array('aseo'=>$aseo));
	}

	public function ocultarAseo($id){
		$aseo=Aseo::where('id',$id)->first();
		$aseo->oculto=new \DateTime();
		$aseo->save();

		$n=new Notification;
		$n->tipo="ocultarAseo";
		$n->para=$aseo->user_id;
		$n->aseo_id=$aseo->id;
		$n->save();
		return redirect()->route('admin.aseos');
	}

    public function mostrarAseo($id){
        $aseo=Aseo::where('id',$id)->first();
        $aseo->oculto=null;
        $aseo->save();

        $n=new Notification;
		$n->tipo="mostrarAseo";
		$n->para=$aseo->user_id;
		$n->aseo_id=$aseo->id;
		$n->save();
        return redirect()->route('admin.aseos');
    }

    public function eliminarAseo($id){
        Aseo::where('id',$id)->delete();
        return redirect()->route('admin.aseos');
    }

    //MENSAJES
	public function mensajes(Request $request){
		$mensajes=Message::where('respondido',null);
    $n=$request->input('nombre');
    if($n!=null && $n!=""){
      $mensajes=$mensajes->where('name', 'like', '%'.$n.'%');
    }
    $n=$request->input('email');
    if($n!=null && $n!=""){
      $mensajes=$mensajes->where('email', 'like', '%'.$n.'%');
    }
		return view('pages/admin/mensajes', array('mensajes'=>$mensajes->get()));
	}
	public function eliminarMensaje($id){
        Message::where('id',$id)->delete();
        return redirect()->route('admin.mensajes');
    }

    public function editarUsuario($id){
        $usuario=User::where('id',$id)->first();
        return view('pages/admin/editarUsuario', array('usuario'=>$usuario));
    }

    public function guardarUsuario(Request $request){
        $request->validate([
            'name'=>'string|required|min:2|max:255',
            'email'=>'email|required|min:6|max:255']);
        $user=User::find($request->input('id'));
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->role_id=$request->input('rol');
        $user->puntuacion=$request->input('puntuacion');
        $user->save();
        return redirect()->route('admin.usuarios');
    }

    public function year($year){
            $lineas=array();
            $usuarios=array();
            $aseos=array();
            for ($i=1;$i<13;$i++){
                $linea=DB::table('users')->whereYear('created_at', $year)->whereMonth('created_at',$i)->count();
                $linea2=DB::table('aseos')->whereYear('created_at', $year)->whereMonth('created_at',$i)->count();
                array_push($lineas,['mes'=>$i,'usuarios'=>$linea,'aseos'=>$linea2]);
            }

        return view('pages/admin', ['lineas'=>$lineas]);
        /*$grafico1 = DB::table('proyecto.users')
            ->select(DB::raw('COUNT(id) as usuarios, year(created_at) as year, month(created_at) as mes'))
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('year(created_at), month(created_at)'))
            ->get();
            $lineas=array();
            for($i=1; $i<=12;$i++){
                $linea=$grafico1->where('mes',$i)->first();
                if (isset($linea)){
                    array_push($lineas,['mes'=>$i,'usuarios'=>$linea->usuarios]);
                }else{
                    array_push($lineas,['mes'=>$i,'usuarios'=>0]);
                }
            }*/
    }
}
