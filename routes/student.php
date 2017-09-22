<?php

Route::get('/proyectos', 'StudentController@proyectos')
    ->name('proyectos')
    ->middleware('create-project');

Route::post('/proyectos', 'ProyectoController@store')
    ->name('proyectos.store')
    ->middleware('create-project');

Route::get('/documentacion', 'StudentController@documentos')
    ->name('documentacion');

Route::get('/invitaciones', 'StudentController@invitaciones')
    ->name('invitaciones');

Route::get('/modelobd', 'StudentController@modelobd')
    ->name('modelobd');

Route::get('/documentosCodificacion','StudentController@documentosCodificacion')
    ->name('documentosCodificacion');

Route::get('documentosBd','StudentController@documentosBd')
    ->name('documentosBd');

Route::get('/plataformaStudent','StudentController@plataforma')
    ->name('plataformaStudent');


Route::prefix('evaluacion')->group(function () {

    Route::get('modelacion', 'StudentController@evaluacionModelado')
        ->name('evalucion.modelacion');
});
