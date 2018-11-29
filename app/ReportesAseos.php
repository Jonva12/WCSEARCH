<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Aseo;

class ReportesAseos extends Model
{
  protected $table = 'reportes_aseos';
   
   public function aseo(){
    	return $this->belongsTo('App\Aseo');
    }
}
