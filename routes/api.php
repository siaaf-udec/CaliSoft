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

Route::resource('documentacion', 'DocumentoController', [
    'only' => ['index', 'store', 'update', 'destroy'],
]);

Route::resource('tdocumentos', 'TiposDocumentoController', [
    'only' => ['index', 'store', 'update', 'destroy'],
]);

Route::get('tdocumentos/{tdocumento}/componentes', 'TiposDocumentoController@getComponents')
    ->name('tdocumentos.componentes');

Route::get('/user/project', 'UserController@proyecto');

Route::get('/student/search', 'UserController@searchFreeStudents');
Route::get('/student/invitations', 'UserController@invitaciones');

Route::resource('invitations', 'InvitationController', [
    'only'       => ['store', 'update', 'destroy'],
    'parameters' => [
        'invitations' => 'proyecto',
    ],
]);

Route::resource('componentes', 'ComponenteController', [
    'only' => ['store', 'update', 'destroy', 'index'],
]);

Route::get('peticiones', 'AdminProyectoController@getPeticiones');
Route::put('/peticiones/{proyecto}', 'AdminProyectoController@update');

//Proyecto Admin Controller Index ?
Route::resource('proyectos', 'AdminProyectoController', [
    'only' => ['index'],
]);

//Proyecto Student Controller Store, Update
Route::put('/proyectos/{proyecto}', 'ProyectoController@update');
Route::put('/proyectos/{proyecto}/propuesta', 'ProyectoController@propuesta');
Route::get('/proyectos/{proyecto}/documentacion', 'ProyectoController@documentos');

Route::delete('/proyectos/{proyecto}', 'ProyectoController@destroy');
