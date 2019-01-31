<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\CorreoResetPass;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Comentario;
use App\Aseo;
use App\Role;

class User extends Authenticatable implements MustVerifyEmail
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
        'password', 'remember_token','fecha_de_baneo'
    ];

    public function newNotification () {
      $this->notify(new Notification);
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new Notifications\Correo);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new Notifications\CorreoResetPass($token));
    }

    public function comentario(){
      return $this->hasMany('App\Comentario');
    }

    public function valoracion(){
      return $this->belongsToMany('App\Comentario')->withPivot('puntuacion');
    }

    public function aseos(){
      return $this->hasMany('App\Aseo');
    }

    public function role(){
      return $this->belongsTo('App\Role');
    }

    public function misNotificaciones(){
      return $this->hasMany('App\Notification', 'de');
    }

    public function notificacionesRecividas(){
      return $this->hasMany('App\Notification', 'para');
    }

}
