<?php

Route::get('/', 'StudentController@index')
    ->name('student');


Route::get('/proyectos', 'StudentController@proyectos')
    ->name('proyectos')
    ->middleware('create-project');


Route::post('/proyectos', 'ProyectosController@store')
    ->name('proyectos.store')
    ->middleware('create-project');


Route::get('/porcentajes', 'StudentController@porcentajes')
    ->name('porcentajes');

Route::get('/documentacion', 'StudentController@documentos')
    ->name('documentacion');
