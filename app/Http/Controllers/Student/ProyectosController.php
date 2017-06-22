<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categorias as Categoria;
use App\Semillero;
use App\GrupoDeInvestigacion as Grupo;
use App\Proyecto;

class ProyectosController extends Controller
{
    function __construct(){
        $this->middleware('auth');
        $this->middleware('role:student', [
            'except' => ['index']
        ]);
    }

    public function index($tabla){

       if($tabla == "categorias"){
          return Categoria::all();
       }
       if($tabla == "semilleros"){
          return Semillero::all();
       }
       if($tabla == "grupos"){
          return Grupo::all();
       } 

    }

    public function store(Request $request){
    
         return Proyecto::create([
              'nombre'                    => $request->nombre,
              'FK_GrupoDeInvestigacionId' => $request->FK_grupo,
              'FK_SemilleroId'            => $request->FK_semillero,
              'FK_CategoriaId'            => $request->FK_categoria
         ]);
    }
}
