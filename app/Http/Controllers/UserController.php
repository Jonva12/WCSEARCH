<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(array('auth', 'verified'));
    }

    public function index()
    {
        /*if (Auth::user()->name=="usuario"){
            return redirect()->route('usuario');
        }*/
        return view('pages.home');
    }
}
