<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Aseo;

class chartController extends Controller
{
    public function year($year){
    	$grafico1=DB::table('proyecto.users')
    		->whereYear('created_at', $year)
    		->orderBy('created_at')
    		->get();
    		for ($i=1;$i<13;$i++){
    			$numUsuarios=$grafico1->where();$year+-+$i

    		}
    		

    	/*$grafico1 = DB::table('proyecto.users')
    		->select(DB::raw('COUNT(id) as usuarios, year(created_at) as year, month(created_at) as mes'))
    		->whereYear('created_at', $year)
    		->groupBy(DB::raw('year(created_at), month(created_at)'))
    		->get();*/
    		$lineas=array();
    		for($i=1; $i<=12;$i++){
                $linea=$grafico1->where('mes',$i)->first();
                if (isset($linea)){
                    array_push($lineas,['mes'=>$i,'usuarios'=>$linea->usuarios]);
                }else{
                    array_push($lineas,['mes'=>$i,'usuarios'=>0]);
                }
            }

    	return view('pages/admin/estadistica', ['lineas'=>$lineas]);
    }
}
