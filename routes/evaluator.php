<?php

Route::get('/', 'EvaluatorController@index')->name('evaluator');
Route::get('/Porcentajes', 'EvaluatorController@categorias')->name('evaluator.categorias');
Route::get('/perfil', 'EvaluatorController@perfil')->name('evaluator.perfil');