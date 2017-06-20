<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Categorias;
use Illuminate\Http\Request;
use App\Categorias As Categoria;
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
         return Categoria::all();
         
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
            'nombre'=>'required|string',
            'plataforma'=>'required|integer',
            'modelado'=>'required|integer',
            'despliegue'=>'required|integer',
            'entidad_relacion'=>'required|integer',
            'clases'=>'required|integer',
            'actividades'=>'required|integer',
            'uso'=>'required|integer',
        ]);

        return Categoria::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorias $categorias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorias $categorias)
    {
        //
    }
}
