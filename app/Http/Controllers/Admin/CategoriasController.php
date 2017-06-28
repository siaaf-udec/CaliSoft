<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Categorias;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;

class CategoriasController extends Controller
{
    function __construct()
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
        $this->validate($request,[
            'nombre'=>'required|max:255|string|regex:/^[0-9]{1,3}(\.[0-9]{0,2})?$/',
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
        $this->validate($request,[
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
