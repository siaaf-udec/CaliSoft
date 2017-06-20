<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\GrupoDeInvestigacion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GrupoDeInvestigacionController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin', [
            'except' => ['index']
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return GrupoDeInvestigacion::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre' => 'required|string|unique:TBL_GruposDeInvestigacion']);
        return GrupoDeInvestigacion::create(['nombre' => $request->nombre]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GrupoDeInvestigacion  $grupoDeInvestigacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GrupoDeInvestigacion $grupos_de_investigacion)
    {
        $this->validate($request, [
            'nombre' => [
                'string',
                Rule::unique('TBL_GruposDeInvestigacion')->ignore($grupos_de_investigacion->PK_id, 'Pk_id')
            ]
        ]);

        $grupos_de_investigacion->nombre = $request->nombre;
        $grupos_de_investigacion->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GrupoDeInvestigacion  $grupoDeInvestigacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GrupoDeInvestigacion::destroy($id);
    }
}
