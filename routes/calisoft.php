<?php

 
Route::prefix('/perfil')->group(function (){
    Route::get('', 'PerfilController@index')->name('perfil.index');
    Route::put('', 'PerfilController@update')->name('perfil.update');
});
