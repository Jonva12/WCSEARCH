<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//rutas para mapa api
Route::apiResource('aseo', 'ApiAseosController');

Route::post('aseo/{id}/reportar', 'ApiAseosController@reportar');

Route::get('aseo/{id}/valorar', 'ApiAseosController@valorar')->middleware('auth:api');

Route::apiResource('comentarios', 'ApiComentariosController');

Route::get('comentarios/{id}/mios', 'ApiComentariosController@showMio')->middleware('auth:api');

Route::post('comentarios/{id}', 'ApiComentariosController@store')->middleware('auth:api');

Route::post('comentarios/{id}/valorar', 'ApiComentariosController@valorar')->middleware('auth:api');

//Routas notificaciones
Route::get('notificaciones/tiene', 'NotificationController@tieneNotificaciones');
Route::get('notificaciones/get', 'NotificationController@getNotificaciones');
Route::get('notificaciones/leer/{id}', 'NotificationController@leerNotificacion');
Route::get('notificaciones/leerTodas', 'NotificationController@leerTodas');
