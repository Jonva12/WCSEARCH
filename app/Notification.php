<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function deUsuario(){
    	return $this->belongsTo('App\User','de','id');
    }
    public function paraUsuario(){
    	return $this->belongsTo('App\User','para','id');
    }
    public function aseo(){
    	return $this->belongsTo('App\Aseo');
    }
    public function comentario(){
    	return $this->belongsTo('App\Comentario');
    }
}
