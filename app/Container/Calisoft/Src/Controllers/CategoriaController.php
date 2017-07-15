<?php

namespace App\Container\Calisoft\Src\Controllers;

use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin', [
            'except' => ['index']
        ]);
    }


    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return Categorias::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'=> 'required|string|unique:TBL_Categorias',
            'plataforma'=>'required|integer',
            'modelado'=>'required|integer',
            'despliegue'=>'required|integer',
            'entidad_relacion'=>'required|integer',
            'clases'=>'required|integer',
            'actividades'=>'required|integer',
            'sequencia'=>'required|integer',
            'uso'=>'required|integer',
        ]);
        return Categorias::create($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorias $categoria)
    {
        $this->validate($request, [
            'nombre' => 'required|string|unique:TBL_Categorias,nombre,' . $categoria->PK_id . ',PK_id',
            'plataforma'=>'required|integer',
            'modelado'=>'required|integer',
            'despliegue'=>'required|integer',
            'entidad_relacion'=>'required|integer',
            'clases'=>'required|integer',
            'actividades'=>'required|integer',
            'sequencia'=>'required|integer',
            'uso'=>'required|integer',
        ]);
        $categoria->fill($request->all());
        $categoria->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorias $categoria)
    {
        $categoria->delete();
    }
}
