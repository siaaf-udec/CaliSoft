<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Categorias as Categoria;
use App\Semillero;
use App\GrupoDeInvestigacion as Grupo;
use App\Proyecto;

class ProyectoController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:student')->except('index');
    }

    public function index()
    {
        return Proyecto::all();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:5|unique:TBL_Proyectos',
            'grupo' => 'required|integer',
            'semillero' => 'required|integer',
            'categoria' => 'required|integer'
        ]);

        $request->user()->proyectos()->create([
            'nombre' => $request->nombre,
            'FK_GrupoDeInvestigacionId' => $request->grupo,
            'FK_SemilleroId' => $request->semillero,
            'FK_CategoriaId' => $request->categoria
        ], [
            'tipo' => 'integrante'
        ]);

        return redirect()->route('student');
    }

    public function update(Request $request, Proyecto $proyecto)
    {
      $this->validate($request, [
          'nombre' => sprintf('string|min:5|unique:TBL_Proyectos,nombre,%d,PK_id', $proyecto->PK_id),
          'FK_CategoriaId' => 'integer',
          'FK_SemilleroId' => 'integer',
          'FK_GrupoDeInvestigacionId' => 'integer'
      ]);

      $proyecto->update($request->all());
    }


    public function documentos(Proyecto $proyecto)
    {
        return $proyecto->documentos;
    }


    public function invitados(Proyecto $proyecto)
    {
        return $proyecto->usuarios()->wherePivot('tipo', 'invitado')->get();
    }

    public function integrantes(Proyecto $proyecto)
    {
        return $proyecto->usuarios()->wherePivot('tipo', 'integrante')->get();
    }




}
