<?php


namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\TiposDocumento;
use App\Container\Calisoft\Src\Componente;

class ComponenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin', [
            'except' => ['index']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Aqui realizo validaciones,
       $this->validate($request, [
            'nombre' => 'required|string|unique:TBL_ComponentesDocumento',
            'descripcion' => 'required|string',
            'FK_TipoDocumentoId' => 'required|integer',
            'required' => 'required|boolean'
        ]);

        return Componente::create([
            'nombre' => $request->nombre,
            'descripcion'=> $request->descripcion,
            'FK_TipoDocumentoId'=> $request->FK_TipoDocumentoId,
            'required'=> $request->required
        ]);
    }


    public function update(Request $request, Componente $componente)
    {
        $this->validate($request, [
            'nombre' => 'string|unique:TBL_ComponentesDocumento,nombre,' . $componente->PK_id . ',PK_id',
            'required' => 'boolean',
            'descripcion' => 'string'
        ]);

        $componente->update(
            $request->only('nombre', 'required', 'descripcion')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Componente $componente)
    {
        $componente->delete();
    }
}
