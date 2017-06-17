<?php

Route::get('/', 'AdminController@index')->name('admin');
Route::get('/semilleros', 'AdminController@semilleros')->name('semilleros');