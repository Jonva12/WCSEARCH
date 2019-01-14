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
  if(isset(Auth::user()->id)){
    return redirect()->route('home');
  }
	return view('pages/index');
});

Route::post('form', 'formController@insert');

//rutas administrador
Route::get('/admin/', 'AdminController@index')->name('admin');
Route::get('/admin/usuarios/{baneados?}', 'AdminController@usuarios')->name('admin.usuarios');
Route::get('/admin/usuario/editar/{id}', 'AdminController@editarUsuario')->name('admin.usuario.editar');
Route::get('/admin/usuario/banear/{id}', 'AdminController@banearUsuario')->name('admin.usuario.banear');
Route::get('/admin/usuario/desbanear/{id}', 'AdminController@desbanearUsuario')->name('admin.usuario.desbanear');
Route::get('/admin/usuario/guardar/', 'AdminController@guardarUsuario')->name('admin.guardarUsuario');

Route::get('/admin/aseos/{ocultos?}', 'AdminController@aseos')->name('admin.aseos');
Route::get('/admin/aseo/{id}', 'AdminController@aseo')->name('admin.aseo');
Route::get('/admin/aseo/ocultar/{id}', 'AdminController@ocultarAseo')->name('admin.aseo.ocultar');
Route::get('/admin/aseo/mostrar/{id}', 'AdminController@mostrarAseo')->name('admin.aseo.mostrar');
Route::get('/admin/aseo/eliminar/{id}', 'AdminController@eliminarAseo')->name('admin.aseo.eliminar');

Route::get('/admin/mensajes', 'AdminController@mensajes')->name('admin.mensajes');
Route::get('/admin/mensaje/eliminar/{id}', 'AdminController@eliminarMensaje')->name('admin.mensaje.eliminar');

//rutas usuarios
Route::get('/usuario', 'UserController@perfil')->name('usuario');
Route::get('/usuario/p/{id}', 'UserController@perfil')->name('usuario.perfil');
Route::get('/usuario/ajustes', 'UserController@ajustes')->name('usuario.ajustes');
Route::get('/usuario/cambiarDatos', 'UserController@cambiarDatos')->name('usuario.cambiarDatos');
Route::get('/usuario/cambiarPassword', 'UserController@cambiarPassword')->name('usuario.cambiarPassword');
Route::get('/usuario/borrarCuenta', 'UserController@borrarCuenta')->name('usuario.borrarCuenta');


Route::get('/baneado', 'BaneoController@index')->name('baneado');
Route::get('/sinPermisos', function(){
  return view('pages/sinPermisos');
})->name('sinPermisos');


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


//Routas aseos
// Route::get('/ficha', function () {
//     return view('pages/fichaWC');
// });
Route::get('/createWC', 'BathController@form')->name('wc.form');
Route::post('/ficha','BathController@create')->name('wc.create');
Route::get('/ficha/{id}', 'BathController@ficha')->name('wc.ficha'); 

//routas lenguaje
Route::get('lang/{lang}', function($lang) {
  \Session::put('lang', $lang);
  return \Redirect::back();
})->middleware('web')->name('change_lang');

//Routas notificaciones
Route::get('/api/notificaciones/tiene', 'NotificationController@tieneNotificaciones');
Route::get('/api/notificaciones/get', 'NotificationController@getNotificaciones');
Route::get('/api/notificaciones/leer/{id}', 'NotificationController@leerNotificacion');
Route::get('/api/notificaciones/leerTodas', 'NotificationController@leerTodas');
