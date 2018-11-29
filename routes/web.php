<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
	return view('pages/index');
});

Route::post('form', 'formController@insert');

Route::get('/login', function(){
	return view('pages/login');
});

Route::get('/register', function(){
	return view('pages/register');
});

Route::get('/admin', function(){
	return view('pages/admin');
});
