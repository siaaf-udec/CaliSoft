<?php
Route::get('/proyectos/{proyecto}/modelacion', 'EvaluatorController@documentacion')
    ->name('evaluator-modelacion');

Route::get('/proyectos/{proyecto}/plataforma', 'EvaluatorController@plataforma')
    ->name('evaluator-plataforma');

Route::get('/evaluar/{documento}', 'EvaluatorController@evaluar')
    ->name('evaluator-eval');

Route::get('/proyectos/{proyecto}/codificacion','EvaluatorController@codificacion')
    ->name('evaluator-codificacion');

Route::get('/evaluar-codificacion/{script}','EvaluatorController@evaluarScripts')
    ->name('evaluator-eval-script');

Route::get('/proyectos/{proyecto}/basedatos','EvaluatorController@basedatos')
    ->name('evaluator-basedatos');

Route::get('/proyectos/{proyecto}/plataforma/{casoPrueba}','EvaluatorController@escenario')
    ->name('evaluator-escenario');    
