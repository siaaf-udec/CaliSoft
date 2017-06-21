<?php

Route::get('/', 'AdminController@index')->name('admin');
Route::get('/semilleros', 'AdminController@semilleros')->name('semilleros');
Route::get('/categorias', 'AdminController@categorias')->name('categorias');
Route::get('/usuarios', 'AdminController@usuarios')->name('usuarios');
Route::get('/tdocumento', 'TiposDocumentoController@index')->name('tdocumento');
Route::get('/documento/{documento}/componentes', 'AdminController@componentes')->name('componentes');
