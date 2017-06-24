<?php

Route::get('/', 'StudentController@index')->name('student');
Route::get('/Proyectos', 'StudentController@proyectos')->name('proyectos')->middleware('project');
Route::get('/Porcentajes', 'StudentController@verPorcentajes')->name('porcentajes');
Route::get('/Documentacion', 'StudentController@subirDocumentacion')->name('documentacion');
Route::get('/Mensaje','StudentController@mensaje')->name('mensaje');