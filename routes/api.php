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

Route::resource('proyectos/{tabla?}', 'Student\ProyectosController', [
    'only' => ['index', 'store']
]);

Route::resource('documentacion', 'Student\DocumentosController', [
    'only' => ['index', 'store', 'update', 'destroy']
]);

Route::get('tdocumentos/{documento}/componentes', 'Admin\TiposDocumentoController@getComponents')
    ->name('tdocumentos.componentes');

Route::resource('componentes', 'Admin\ComponenteController', [
    'only' => ['store', 'update', 'destroy','index']
]);
