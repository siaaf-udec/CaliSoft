<?php

//Evaluaciones de documentacion
Route::resource('evaluaciones', 'DocumentEvalController', [
    'only' => ['show', 'update'],
    'parameters' => [
        'evaluaciones' => 'documento'
    ]
]);
//evaluaciones de scripts
Route::resource('evaluacionesScript','NotaScriptController',[
    'only' => ['show', 'update'],
    'parameters' => [
        'evaluacionesScript' => 'script'
    ]
]);