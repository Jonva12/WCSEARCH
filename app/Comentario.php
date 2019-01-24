<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Aseo;

class Comentario extends Model
{
    public function usuario(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function aseo(){
    	return $this->belongsTo('App\Aseo');
    }

    public function valoracion(){
    	return $this->belongsToMany('App\User')->withPivot('puntuacion');
    }

    public function notificaciones(){
        return $this->hasMany('App\Notification');
    }
}
