<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Http\Controllers\Controller;
use App\Notification;


class formController extends Controller
{
    public function insert(Request $request){
		$request->validate([
			'name'=>'string|required|min:2|max:40',
			'email'=>'email|required|min:6|max:255',
			'message'=>'required|min:1|max:255']
		);

    	$data = new Message; 

    	//pillar los daos del input

    	$data->name=$request->input('name');
    	$data->email=$request->input('email');
    	$data->message=$request->input('message');

    	$data->save(); 

        $admins=User::join('roles','users.role_id','roles.id')->where('roles.nombre','admin')->get();
        foreach ($admins as $admin) {
            $n=new Notification;
            $n->tipo=$tipo;
            $n->para=$admin->id;
            $n->save();
        }

    	return view('pages/index'); 
    }
}
