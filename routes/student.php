<?php

Route::get('/', 'StudentController@index')
    ->name('student');


Route::get('/proyectos', 'StudentController@proyectos')
    ->name('proyectos')
    ->middleware('create-project');


Route::post('/proyectos', 'ProyectoController@store')
    ->name('proyectos.store')
    ->middleware('create-project');



Route::get('/porcentajes', 'StudentController@porcentajes')
    ->name('porcentajes');

Route::get('/documentacion', 'StudentController@documentos')
    ->name('documentacion');

Route::get('/invitaciones', 'StudentController@invitaciones')
    ->name('invitaciones');

Route::get('/perfil', 'StudentController@perfil')->name('student.perfil');    
