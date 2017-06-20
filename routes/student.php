<?php

Route::get('/', 'StudentController@index')->name('student');
Route::get('/Proyectos', 'StudentController@proyectos')->name('proyectos');