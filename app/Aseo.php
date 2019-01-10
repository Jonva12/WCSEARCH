<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comentario;

class Aseo extends Model
{
    public function usuario(){
    	return $this->belongsTo('App\User');
    }

    public function comentarios(){
    	return $this->hasMany('App\Comentario');
    }

    public function valoracion(){
    	return $this->belongsToMany('App\User')->withPivot('puntuacion');
    }

    public function reportes(){
    	return $this->hasMany('App\ReportesAseos');
    }

    public function notificaciones(){
        return $this->hasMany('App\Notification');
    }
}
