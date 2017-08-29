<?php
Route::get('/proyectos/{proyecto}/modelacion', 'EvaluatorController@documentacion')
    ->name('evaluator-modelacion');

Route::get('/evaluar/{documento}', 'EvaluatorController@evaluar')
    ->name('evaluator-eval');