<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
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
    public function store(Request $request)
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
            'entrega' => '0',
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
    public function update(Request $request, $id)
    {
        //
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
