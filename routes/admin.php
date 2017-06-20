<?php

Route::get('/', 'AdminController@index')->name('admin');
Route::get('/semilleros', 'AdminController@semilleros')->name('semilleros');
Route::get('/categorias', 'AdminController@categorias')->name('categorias');
Route::get('/usuarios', 'AdminController@usuarios')->name('usuarios');

Route::get('/register-evaluador', 'RegisterEvaluadorController@index')->name('register-evaluador');

