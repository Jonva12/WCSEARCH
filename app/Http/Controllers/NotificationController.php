<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    public function tieneNotificaciones($id){
    	$notificaciones=Notification::where('para', $id)->whereNull('read_at')->get();
    	if($notificaciones->count()==0){
    		return 0;
    	}else{
    		return 1;
    	}
    }

    public function getNotificaciones($id){
    	$notificaciones=Notification::where('para', $id)->get();
    	$array = array();
    	if($notificaciones->count()!=0){
    		foreach($notificaciones as $n){
    			switch ($n->type) {
    				case 'comentar':
    					$texto=$n->deUsuario->name." ha puesto un comentario en tu aseo(".$n->aseo->nombre.")";
    					break;

    			}
    			$paraEnviar=["texto"=>$texto, "leido"=>$n->read_at!=null];

    			array_push($array, $paraEnviar);
    		}
    		return $array;
    	}
    	return null;
    }

    public function createNotificacion($notifi){
    	$n=new Notification;
    	$n->de=$notifi->de;
    	$n->para=$notifi->para;
    	$n->type=$notifi->type;
    	$n->aseo_id=$notifi->aseo_id;
    	$n->comentario_id=$notifi->comentario_id;
    	$n->save();
    }
}
