<?php

namespace App\Http\Controllers\Student;

use App\Container\Calisoft\Src\Documentos;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\TiposDocumento;
use App\Container\Calisoft\Src\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectoId = auth()->user()->proyectos()->first();
        $documents  = Documentos::where('FK_ProyectoId', $proyectoId->pivot->FK_ProyectoId)->get();
        return $documents;
        //$docs = Documentos::All();
        //  return view('student.student-subir-documentacion',compact('docs'));
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
        $this->validate($request, [
            'FK_ProyectoId'      => 'required|integer',
            'FK_TipoDocumentoId' => 'required|integer',

        ]);

        return Documentos::create([
            'url'                => $request->url,
            'FK_ProyectoId'      => $request->FK_ProyectoId,
            'FK_TipoDocumentoId' => $request->FK_TipoDocumentoId,
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
    public function update(Request $request, Documentos $documentacion)
    {
        $this->validate($request, [
            'url'                => 'required|string',
            'FK_ProyectoId'      => 'required|integer',
            'FK_TipoDocumentoId' => 'required|integer',
        ]);
        $documentacion->fill($request->all());
        $documentacion->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documentos $documentacion)
    {
        $documentacion->delete();
    }

    public function getTipos()
    {
        return $tdocumento = TiposDocumento::all();
    }

    //public function getDocumentos(Proyecto $documento)
    //{
    //  return $documento->
    //}
}
