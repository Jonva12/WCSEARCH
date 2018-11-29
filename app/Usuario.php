<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comentario;
use App\Aseo;

class Usuario extends Model
{
    public function comentario(){
      return $this->hasMany('App\Comentario');
    }

    public function valoracion(){
      return $this->belongsToMany('App\Comentario')->withPivot('puntuacion');
    }

    public function aseo(){
      return $this->hasMany('App\Aseo');
    }
}
