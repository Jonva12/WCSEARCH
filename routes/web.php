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

//rutas administrador
Route::get('/admin/', 'AdminController@index')->name('admin');
Route::get('/admin/usuarios/{baneados?}', 'AdminController@usuarios')->name('admin.usuarios');
Route::get('/admin/usuario/banear/{id}', 'AdminController@banearUsuario')->name('admin.usuario.banear');
Route::get('/admin/usuario/desbanear/{id}', 'AdminController@desbanearUsuario')->name('admin.usuario.desbanear');

Route::get('/admin/aseos/{ocultos?}', 'AdminController@aseos')->name('admin.aseos');
Route::get('/admin/aseo/{id}', 'AdminController@aseo')->name('admin.aseo');
Route::get('/admin/aseo/ocultar/{id}', 'AdminController@ocultarAseo')->name('admin.aseo.ocultar');
Route::get('/admin/aseo/mostrar/{id}', 'AdminController@mostrarAseo')->name('admin.aseo.mostrar');
Route::get('/admin/aseo/eliminar/{id}', 'AdminController@eliminarAseo')->name('admin.aseo.eliminar');

Route::get('/admin/mensajes', 'AdminController@mensajes')->name('admin.mensajes');
Route::get('/admin/mensaje/eliminar/{id}', 'AdminController@eliminarMensaje')->name('admin.mensaje.eliminar');

//rutas usuarios
Route::get('/usuario', 'UserController@index')->name('usuario');
Route::get('/usuario/perfil/{id}', 'UserController@perfil')->name('usuario.perfil');



Auth::routes();
Auth::routes(['verify' => true]);

Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');

Route::get('notify', function () {
    $user = \App\User::find(1);
    $user->notify(new \App\Notifications\NewNotification());
});

Route::get('notify', function () {
    (new User)->forceFill([
        'name' => request('name'),
        'email' => request('email'),
    ])->notify(new \App\Notifications\NewNotification());
});
//Rutas resetear contraseña
Route::get('request', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('lang/{lang}', function($lang) {
  \Session::put('lang', $lang);
  return \Redirect::back();
})->middleware('web')->name('change_lang');

