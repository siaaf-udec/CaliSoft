<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Container\Calisoft\Src\Requests\CasoPruebaStoreRequest;
use App\Container\Calisoft\Src\Requests\CasoPruebaEnviarRequest;
use App\Container\Calisoft\Src\CasoPrueba;
use App\Http\Controllers\Controller;


class CasoPruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CasoPruebaStoreRequest $request)
    {
        return CasoPrueba::create([
            'nombre' => $request->nombre,
            'proposito'=> $request->proposito,
            'alcance'=> $request->alcance,
            'resultado_esperado'=> $request->resultado_esperado,
            'criterios' => $request->criterios,
            'prioridad'=> $request->prioridad,
            'limite' => $request->limite,
            'formulario' => '-',
            'observacion' => '-',
            'entrega' => 0,
            'FK_ProyectoId'=> $request->FK_ProyectoId,
            'FK_UsuarioId' => 6

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CasoPrueba $casoPrueba)
    {
        return $casoPrueba;
    }

    public function enviarCasoPrueba(CasoPruebaEnviarRequest $request, CasoPrueba $casoPrueba)
    {
        $proyecto = $request->user()->proyectos()->first(); //obtiene el proyecto del usuario logeado
        $doc = new CasoPrueba(); //inicializa el caso prueba a guardar
        $file = $request->file('formulario'); //obtiene el archivo
        //$doc->nombre = $file->getClientOriginalName(); //nombre del archivo
        $doc->formulario = $file->store('/', 'casoPruebas'); //guarda el archivo
        //Verifica si hay alguna observación
        if($request->observacion == NULL){
            $doc->observacion = "No hay observaciones";
        }else{
            $doc->observacion = $request->observacion;
        }
        //Actualiza el caso prueba 
        $proyecto->casoPruebas()->where('PK_id','=',$casoPrueba->PK_id)->update([
        'observacion' => $doc->observacion,
        'formulario' => $doc->formulario,
        ]);
        
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
