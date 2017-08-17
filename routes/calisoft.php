<?php


Route::prefix('/perfil')->group(function (){
    Route::get('/', 'PerfilController@index')->name('perfil.index');
    Route::post('/', 'PerfilController@update')->name('perfil.update');
    Route::post('password', 'PerfilController@updatePassword')->name('perfil.password');
    Route::post('foto', 'PerfilController@fotoUp')->name('perfil.foto');
});


Route::get('porcentajes', 'UserController@porcentajes')->name('porcentajes');
Route::get('porcentajesbd', 'UserController@porcentajesBD')->name('porcentajesbd');

Route::get('porcentajesCodificacion','UserController@porcentajesCodificacion')->name('porcentajesCod');


Route::get('/notificaciones', 'NotificationController@vista')->name('notificaciones');
