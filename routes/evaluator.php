<?php

Route::get('/', 'EvaluatorController@index')->name('evaluator');
Route::get('categorias', 'EvaluatorController@categorias')->name('evaluator.categorias');
