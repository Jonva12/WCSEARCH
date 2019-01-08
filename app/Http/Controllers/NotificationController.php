<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    public function tieneNotificaciones($idUsuario){
    	$notificaciones=Notification::where('para', $id)->whereNull('leido_fecha')->get();
    	if($notificaciones->count()==0){
    		return 0;
    	}else{
    		return 1;
    	}
    }

    public function getNotificaciones($idUsuario){
    	$notificaciones=Notification::where('para', $id)->get();
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

    			}
    			$paraEnviar=["id"=>$n->id,"texto"=>$texto, "leido"=>$n->leido!=null];

    			array_push($array, $paraEnviar);
    		}
    		return $array;
    	}
    	return null;
    }

    public function leerNotificacion($id){
        $n=Notification::where('id', $id)->first();
        $n->leido_fecha= new \Datetime;
        $n->save();
    }
    public function leerTodas($idUsuario){
        $notificaciones=Notification::where('para', $id)->get();
        foreach($notificaciones as $n){
            $n->leido_fecha= new \Datetime;
        }
        $notificaciones->save();
    }


}
