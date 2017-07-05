<?php

use Illuminate\Http\Request;

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


Route::resource('semilleros', 'Admin\SemilleroController', [
    'only' => ['index', 'store', 'update', 'destroy']
]);

Route::resource('grupos-de-investigacion', 'Admin\GrupoDeInvestigacionController', [
    'only' => ['index', 'store', 'update', 'destroy']
]);

Route::resource('categorias', 'Admin\CategoriasController', [
    'only' => ['index', 'store', 'update', 'destroy']
]);

Route::resource('usuarios', 'Admin\UserController', [
    'only' => ['index', 'store', 'update', 'destroy']
]);

Route::resource('documentacion', 'Student\DocumentosController', [
    'only' => ['index', 'store', 'update', 'destroy']
]);

Route::resource('tdocumentos', 'Admin\TiposDocumentoController', [
    'only' => ['index', 'store', 'update', 'destroy']
]);

Route::get('tdocumentos/{tdocumento}/componentes', 'Admin\TiposDocumentoController@getComponents')
    ->name('tdocumentos.componentes');

Route::get('/user/project', 'Admin\UserController@getProject');

Route::get('/student/search', 'Admin\UserController@searchFreeStudents');
Route::get('/student/invitations', 'Admin\UserController@getInvitations');
Route::post('/invitations', 'Student\ProyectosController@storeInvitation');

Route::get('/proyectos/{proyecto}/documentacion', 'Student\ProyectosController@getDocumentos');


Route::resource('componentes', 'Admin\ComponenteController', [
    'only' => ['store', 'update', 'destroy','index']
]);

Route::resource('proyectos', 'Admin\ProyectoController', [
  'only' =>['index','store','update','destroy']
]);
