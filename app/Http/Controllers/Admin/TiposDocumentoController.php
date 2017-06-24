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
      $tdocumento = TiposDocumento::all();
          return view('admin.documento.tipo-documento',[
            'tdocumentos' => $tdocumento,
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
          //return view('material.sections.financiero.contratista.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TiposDocumentoRequest $request)
    {
      /**Contratista::create([
        'v_nombre' => $request['v_nombre'],
        'v_nit' => $request['v_nit'],
        'v_represen_legal' => $request['v_represen_legal'],
        'v_direccion' => $request['v_direccion'],
    ]);
        return redirect('/contratista')->with('success','Operador Creado Correctamente');*/
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
     public function edit()
     {
       /*
         $user = Contratista::find($contratista);
         return view('material.sections.financiero.contratista.edit',[
           'contratista' => $user
         ]);
         */
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      /*
        $user = Contratista::find($contratista);
        $user->fill($request->all());
        $user->save();
        return redirect('/contratista')->with('success','Operador Modificado Correctamente');
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy()
     {
       /*
         Contratista::destroy($contratista);
         return redirect('/contratista')->with('success','Operador Eliminado Correctamente');
         */
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

