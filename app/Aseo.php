<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;
use App\Comentario

class Aseo extends Model
{
    public function usuario(){
    	return $this->belongsTo('App\Usuario')
    }

    public function comentarios(){
    	return $this->hasMany('App\Comentario')
    }

    public function valoracion(){
    	return $this->belongsToMany('App\Usuario')->withPivot('puntuacion');
    }

    public function reportes(){
    	return $this->hasMany('App\ReportesAseos');
    }
}
