<?php

Route::get('/', 'AdminController@index')->name('admin');
Route::get('/semilleros', 'AdminController@semilleros')->name('semilleros');
Route::get('/categorias', 'AdminController@categorias')->name('categorias');
Route::get('/usuarios', 'AdminController@usuarios')->name('usuarios');
Route::get('/tdocumentos', 'AdminController@tipoDocumento')->name('tdocumentos');
Route::get('/proyecto', 'AdminController@proyectos')->name('proyecto.admin');
Route::get('/peticiones', 'AdminController@peticiones')->name('peticiones');
Route::get('/tdocumentos/{tdocumento}/componentes', 'AdminController@componentes')->name('componentes');
Route::get('/perfil', 'AdminController@perfil')->name('admin.perfil');