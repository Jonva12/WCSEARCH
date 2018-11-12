<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Http\Controllers\Controller;

class formController extends Controller
{
    public function insert(Request $request){
    	$data = new Message; 

    	//pillar los daos del input

    	$data->name=$request->input('name');
    	$data->email=$request->input('email');
    	$data->messages=$request->input('messages');

    	$data->save(); 


    	return view('pages/index'); 


    }
}
