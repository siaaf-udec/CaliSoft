<?php
Route::get('/proyectos/{proyecto}/modelacion', 'EvaluatorController@documentacion')
    ->name('evaluator-modelacion');

Route::get('/proyectos/{proyecto}/plataforma', 'EvaluatorController@plataforma')
    ->name('evaluator-plataforma');

Route::get('/evaluar/{documento}', 'EvaluatorController@evaluar')
    ->name('evaluator-eval');