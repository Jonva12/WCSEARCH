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

    public function index(){
    	$usuarios=User::all()->count();
    	$aseos=Aseo::all()->count();
    	$message=Message::all()->count();
    	return view('pages/admin', array('usuarios' => $usuarios, 'aseos' => $aseos, 'message' => $message));
    }

    //USUARIOS
    public function usuarios($baneados = false){
        if ($baneados){
            $usuarios=User::where('fecha_de_baneo', '!=', null)->get();
        }else{
            $usuarios=User::where('fecha_de_baneo', null)->get();
        }
		
		return view('pages/admin/usuarios', array('usuarios'=>$usuarios, 'baneados'=>$baneados));
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
	public function aseos($ocultos = false){
        if ($ocultos){
            $aseos=Aseo::where('oculto', '!=', null)->get();
        }else{
            $aseos=Aseo::where('oculto', null)->get();
        }
		
		return view('pages/admin/aseos', array('aseos'=>$aseos, 'ocultos' => $ocultos));
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
	public function mensajes(){
		$mensajes=Message::all();
		return view('pages/admin/mensajes', array('mensajes'=>$mensajes));
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
        $grafico1=DB::table('users')
            ->whereYear('created_at', $year)
            ->orderBy('created_at')
            ->get();
            $lineas=array();
            for ($i=1;$i<13;$i++){
                $numUsuarios=$grafico1->where($year+-+$i);
                $linea=DB::table('users')
            ->whereYear('created_at', $year)->whereMonth('created_at',$i)->count();

                    array_push($lineas,['mes'=>$i,'usuarios'=>$linea]);
                
            }       
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

        return view('pages/admin/estadistica', ['lineas'=>$lineas]);
    }
}