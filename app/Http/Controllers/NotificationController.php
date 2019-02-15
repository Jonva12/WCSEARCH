<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\User;
use Auth;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function tieneNotificaciones(){
    	$notificaciones=Notification::where('para', Auth::user()->id)->whereNull('leido_fecha')->get();
    	if($notificaciones->count()==0){
    		return 0;
    	}else{
    		return 1;
    	}
    }

    public function getNotificaciones(){
    	$notificaciones=Notification::where('para', Auth::user()->id)->orderBy('created_at', 'desc')->take(10)->get();
    	$array = array();
    	if($notificaciones->count()!=0){
    		foreach($notificaciones as $n){
    			switch ($n->tipo) {
    				case 'comentar':
    					$texto=$n->deUsuario->name." ha puesto un comentario en tu aseo(".$n->aseo->nombre.")";
                        $link='/home?idAseo'.$a->id;
    					break;
                    case 'ocultarAseo':
                        $texto='Tu aseo ('.$n->aseo->nombre.') ha sido eliminado';
                        break;
                    case 'mostrarAseo':
                        $texto='Tu aseo ('.$n->aseo->nombre.') vuelve a estar visible';
                        $link='/home?idAseo'.$a->id;
                        break;
                    case 'mensajeRecibido':
                        $texto='Has recibido un nuevo mensaje';
                        $link='/admin/mensajes';
                        break;
                    case 'aseoReportado':
                        $texto='Tu aseo ('.$n->aseo->nombre.') ha recibido un reporte. Revisa si esta todo bien';
                        $link='/home?idAseo'.$a->id;
                        break;
                    case 'comentarioValorado':
                        $texto=$n->deUsuario->name.' ha valorado tu comentario en el aseo '.$n->aseo->nombre;
                        $link='/home?idAseo'.$a->id;
                        break;
                    case 'aseoComentado':
                        $texto=$n->deUsuario->name.' ha comentado tu aseo ('.$n->aseo->nombre.')';
                        $link='/home?idAseo'.$a->id;
                        break;
                     case 'aseoValorado':
                        $texto=$n->deUsuario->name.' ha valorado tu aseo ('.$n->aseo->nombre.')';
                        $link='/home?idAseo'.$a->id;
                        break;
                    case 'eresGolden':
                        $texto='Enorabuena ya eres usuario GOLDEN';
                        $link="";
                        break;
    			}
    			$paraEnviar=["id"=>$n->id,"texto"=>$texto,"link"=>$link, "leido"=>$n->leido_fecha!=null];

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
        $notificaciones=Notification::where('para', Auth::user()->id)
          ->update(['leido_fecha' => new \Datetime]);
    }
}
