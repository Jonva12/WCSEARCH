<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Comentario;
use App\Aseo;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
