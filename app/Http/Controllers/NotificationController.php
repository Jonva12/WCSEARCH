<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\User;
use Auth;

class NotificationController extends Controller
{
    public function tieneNotificaciones(){
    	$notificaciones=Notification::where('para', Auth::user()->id)->whereNull('leido_fecha')->get();
    	if($notificaciones->count()==0){
    		return 0;
    	}else{
    		return 1;
    	}
    }

    public function getNotificaciones(){
    	$notificaciones=Notification::where('para', Auth::user()->id)->get();
    	$array = array();
    	if($notificaciones->count()!=0){
    		foreach($notificaciones as $n){
    			switch ($n->tipo) {
    				case 'comentar':
    					$texto=$n->deUsuario->name." ha puesto un comentario en tu aseo(".$n->aseo->nombre.")";
    					break;
                    case 'ocultarAseo':
                        $texto='Tu aseo ('.$n->aseo->nombre.') ha sido eliminado';
                        break;
                    case 'mostrarAseo':
                        $texto='Tu aseo ('.$n->aseo->nombre.') vuelve a estar visible';
                        break;
                    case 'mensajeRecibido':
                        $texto='Has recivido un nuevo mensaje';
                        break;

    			}
    			$paraEnviar=["id"=>$n->id,"texto"=>$texto, "leido"=>$n->leido_fecha!=null];

    			array_push($array, $paraEnviar);
    		}
    		return $array;
    	}
    	return null;
    }

    public function leerNotificacion($id){
        $n=Notification::where([
                ['id', $id],
                ['para', Auth::user()->id],
            ])->first();
        $n->leido_fecha= new \Datetime;
        $n->save();
    }
    public function leerTodas(){
        $notificaciones=Notification::where('para', Auth::user()->id)->get();
        foreach($notificaciones as $n){
            $n->leido_fecha= new \Datetime;
        }
        $notificaciones->save();
    }

    public function notificarAdmins($tipo){
        $admins=User::join('roles','users.role_id','roles.id')->where('roles.nombre','admin')->get();
        foreach ($admins as $admin) {
            $n=new Notification;
            $n->tipo=$tipo;
            $n->para=$admin->id;
            $n->save();
        }
    }


}
