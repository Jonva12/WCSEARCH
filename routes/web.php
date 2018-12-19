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

Route::get('/home', 'HomeController@index')->name('home');

