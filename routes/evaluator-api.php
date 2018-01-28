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

//evaluaciones de componentes sql
Route::resource('evaluacionSql','NotaFileBDController',[
    'only' => ['show', 'update'],
    'parameters' => [
        'evaluacionSql' => 'sql'
    ]
]);

// Obtiene la informacion de inicio de prueba
Route::post('testing', 'TestingController@testing');