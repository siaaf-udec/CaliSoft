<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TiposDocumento;
use Illuminate\Http\Request;


class TiposDocumentoController extends Controller
{

    function __construct(){
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
    public function index(Request $request)
    {
        return TiposDocumento::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|unique:TBL_TiposDocumento',
            'required' => 'required|boolean'
        ]);

        return TiposDocumento::create([
            'nombre' => $request->nombre,
            'required' => $request->required
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  TiposDocumento  $tdocumento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TiposDocumento $tdocumento)
    {
        $this->validate($request, [
            'nombre' => 'string|unique:TBL_TiposDocumento,nombre,' . $tdocumento->PK_id . ',PK_id',
            'required' => 'boolean'
        ]);

        $tdocumento->update([
            'nombre' => $request->nombre,
            'required' => $request->required
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  TiposDocumento  $tdocumento
     * @return \Illuminate\Http\Response
     */
     public function destroy(TiposDocumento $tdocumento)
     {
        $tdocumento->delete();
     }

    /**
    * Obtiene los componentes del documento
    * @param TiposDocumento $documento
    * @return \Illuminate\Http\Response  Arreglo con los componentes
    */
    public function getComponents(TiposDocumento $documento)
    {
        return $documento->componentes;
    }

}
