<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Aseo;
use App\Message;

class AdminController extends Controller
{
    public function index(){
    	$usuarios=User::all()->count();
    	$aseos=Aseo::all()->count();
    	$message=Message::all()->count();
    	return view('pages/admin', array('usuarios' => $usuarios, 'aseos' => $aseos, 'message' => $message));
    }
}
