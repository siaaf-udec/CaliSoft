<?php
require_once "admin-api.php";
require_once "evaluator-api.php";
require_once "student-api.php";

 // Consulta y crea notificaiones 
Route::resource('notificaciones', 'NotificationController', [
    'only' => ['index', 'store']
]);

// Inicio consulta y cambio de estado de los proyectos
Route::prefix('proyectos/{proyecto}')->group(function () {
    Route::put('propuesta', 'ProyectoController@propuesta'); // Enviar proyecto como propuesta (Estudiante)
    Route::put('aceptar', 'ProyectoController@aceptar'); // Aceptar el proyecto (Admin)
    Route::put('asignar', 'ProyectoController@asignar'); // Asignar Evaluador (Admin)
    Route::put('desasignar', 'ProyectoController@desasignar'); // Desasignar Evaluador (Admin)
    Route::put('evaluacion', 'ProyectoController@evaluacion'); // Enviar proyecto para evaluacion (Estudiante)
    Route::get('documentacion', 'ProyectoController@documentos'); // Consultar documentos(diagramas) del proyecto
    Route::get('plataforma', 'ProyectoController@plataforma'); // Consulta los Casos de prueba del proyecto
    Route::get('scripts', 'ProyectoController@scripts'); // Consulta el codigo fuente del proyecto
    Route::get('basedatos','ProyectoController@basedatos'); // Consulta el codigo sql del proyecto
});

// Que hace este ?
Route::resource('sql', 'ArchivoSqlController', [
    'only' => ['index', 'store', 'destroy'],
]);

// Que hace este ?
Route::resource('basedatos', 'BaseDatosController', [
    'only' => ['index', 'store', 'update', 'destroy'],
]);

// CRUD Casos de prueba
Route::resource('casoPrueba', 'CasoPruebaController');

// ?
Route::post('enviarCasoPrueba/{casoPrueba}', 'CasoPruebaController@enviarCasoPrueba');

// ?
Route::post('testing', 'CasoPruebaController@testing');

// Consulta los tipos de input
Route::get('tiposInputs', 'TestInputsController@index');