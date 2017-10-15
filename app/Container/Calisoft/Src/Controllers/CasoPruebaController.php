<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Container\Calisoft\Src\Requests\CasoPruebaStoreRequest;
use App\Container\Calisoft\Src\Requests\CasoPruebaEnviarRequest;
use App\Container\Calisoft\Src\CasoPrueba;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


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
            'formulario' => '',
            'observacion' => '',
            'estado' => 'evaluar',
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
        
        $json = json_decode($request->formulario, true);
        
        for ($i = 0; $i < sizeof($json) ; $i++) {
            $json[$i]['testInput'] = $request->testInput[$i];
        }
        
        $proyecto = $request->user()->proyectos()->first(); //obtiene el proyecto del usuario logeado
        $doc = new CasoPrueba(); //inicializa el caso prueba a guardar
        
        if($request->observacion == NULL){
            $doc->observacion = "No hay observaciones";
        }else{
            $doc->observacion = $request->observacion;
        }

        $doc->formulario = json_encode($json);
        
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
    public function destroy(CasoPrueba $casoPrueba)
    {
        Storage::disk('casoPruebas')->delete($casoPrueba->getOriginal('formulario'));
        $casoPrueba->delete();
    }
}
