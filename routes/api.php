<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::resource('notificaciones', 'NotificationController', [
    'only' => ['index', 'store']
]);


Route::resource('semilleros', 'SemilleroController', [
    'only' => ['index', 'store', 'update', 'destroy'],
]);

Route::resource('grupos-de-investigacion', 'GrupoDeInvestigacionController', [
    'only' => ['index', 'store', 'update', 'destroy'],
]);

Route::resource('categorias', 'CategoriaController', [
    'only' => ['index', 'store', 'update', 'destroy'],
]);

Route::resource('usuarios', 'UserController', [
    'only' => ['index', 'store', 'update', 'destroy'],
]);

Route::resource('tdocumentos', 'TiposDocumentoController', [
    'only' => ['index', 'store', 'update', 'destroy'],
]);

Route::get('tdocumentos/{tdocumento}/componentes', 'TiposDocumentoController@getComponents')
    ->name('tdocumentos.componentes');

Route::get('/user/proyectos', 'UserController@proyectos');

Route::prefix('student')->group(function () {
    Route::get('search', 'UserController@searchFreeStudents');
    Route::get('invitations', 'UserController@invitaciones');
});

Route::get('/evaluator/search', 'UserController@searchEvaluators');

Route::resource('invitations', 'InvitationController', [
    'only' => ['store', 'update', 'destroy'],
    'parameters' => [
        'invitations' => 'proyecto',
    ],
]);

Route::resource('componentes', 'ComponenteController', [
    'only' => ['store', 'update', 'destroy', 'index'],
]);

// Inicio proyectos
Route::prefix('proyectos/{proyecto}')->group(function () {
    Route::put('propuesta', 'ProyectoController@propuesta');
    Route::put('aceptar', 'ProyectoController@aceptar');
    Route::put('asignar', 'ProyectoController@asignar');
    Route::put('desasignar', 'ProyectoController@desasignar');
    Route::get('documentacion', 'ProyectoController@documentos');
    Route::get('plataforma', 'ProyectoController@plataforma');
    Route::get('scripts', 'ProyectoController@scripts');
});

Route::resource('proyectos', 'ProyectoController', [
    'only' => ['index', 'update', 'destroy', 'show'],
]);

// Fin proyectos

// subir documentación estudiante
Route::resource('documentacion', 'DocumentoController', [
    'only' => ['index', 'store', 'update', 'destroy'],
]);
// fin subir documentación estudiante

//subir documentacion de codificacion
Route::post('/scripts/preview/{url}', 'ScriptController@preview');

Route::resource('scripts', 'ScriptController', [
    'only' => ['store', 'destroy', 'index']
]);
//fin subir documentacion de codificacion

Route::resource('basedatos', 'BaseDatosController', [
    'only' => ['index', 'store', 'update', 'destroy'],
]);

Route::resource('codificacion', 'ItemsCodificacionController', [
    'only' => ['index', 'update'],
]);


//Sql
Route::post('sql/preview/{url}', 'ArchivoSqlController@preview');

Route::resource('sql', 'ArchivoSqlController', [
    'only' => ['index', 'store', 'destroy'],
]);


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

//Consulta de evaluaciones en estudiante
Route::prefix('evaluacion')->group(function () {
    Route::get('modelado', 'EvaluationApiController@modelado');
});



// crear Caso prueba

Route::resource('casoPrueba', 'CasoPruebaController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
]);

Route::post('enviarCasoPrueba/{casoPrueba}', 'CasoPruebaController@enviarCasoPrueba');
Route::post('testing', 'CasoPruebaController@testing');
//Testing

Route::get('tiposInputs', 'TestInputsController@index');