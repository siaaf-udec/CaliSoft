<?php

Route::get('/', 'StudentController@index')->name('student');
Route::get('/Proyectos', 'StudentController@proyectos')->name('proyectos');
Route::get('/Porcentajes', 'StudentController@verPorcentajes')->name('porcentajes');
Route::get('/Documentacion', 'StudentController@subirDocumentacion')->name('documentacion');