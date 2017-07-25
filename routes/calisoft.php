<?php


    Route::prefix('/perfil')->group(function (){
    Route::get('/', 'PerfilController@index')->name('perfil.index');
    Route::post('/', 'PerfilController@update')->name('perfil.update');
    Route::post('/', 'PerfilController@updatePassword')->name('perfil.password');
});
