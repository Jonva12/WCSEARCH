<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;
use App\Aseo;

class Comentario extends Model
{
    public function usuario(){
    	return $this->belongsTo('App\Usuario');
    }

    public function aseo(){
    	return $this->belongsTo('App\Aseo');
    }

    public function valoracion(){
    	return $this->belongsToMany('App\Usuario')->withPivot('puntuacion');
    }
}
