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

Route::get('/admin/', 'AdminController@index')->name('admin');
Route::get('/admin/usuarios', 'AdminController@usuarios')->name('admin.usuarios');
Route::get('/admin/aseos', 'AdminController@aseos')->name('admin.aseos');
Route::get('/admin/mensajes', 'AdminController@mensajes')->name('admin.mensajes');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

