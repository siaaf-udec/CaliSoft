<?php
namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\Documento;

class DocumentEvalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Extrae y sincroniza las calificaciones,
     * retornando los componentes según el tipo de
     * documento
     *
     * @param  Documento $documento
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        $componentes = $documento->tipo->componentes->pluck('PK_id');
        $documento->evaluaciones()->sync($componentes);
        return $documento->evaluaciones()->get();
    }

    /**
     * Actualiza la calificacion del componente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Documento $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documento $documento)
    {
        $this->validate($request, [
            'componente_id' => 'required|integer',
            'checked' => 'boolean',
            'observacion' => 'nullable|string'
        ]);

        $documento->evaluaciones()->updateExistingPivot(
            $request->componente_id,
            $request->only('checked', 'observacion')
        );
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
