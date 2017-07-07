<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Categorias as Categoria;
use App\Semillero;
use App\GrupoDeInvestigacion as Grupo;
use App\Proyecto;

class ProyectosController extends Controller
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

        $proyecto = Proyecto::create([
            'nombre' => $request->nombre,
            'FK_GrupoDeInvestigacionId' => $request->grupo,
            'FK_SemilleroId' => $request->semillero,
            'FK_CategoriaId' => $request->categoria
        ]);

        $user = $request->user();
        $user->proyecto()->associate($proyecto);
        $user->save();
        return redirect()->route('student');
    }

    public function getDocumentos(Proyecto $proyecto)
    {
        return $proyecto->documentos;
    }


    public function getInvitated(Proyecto $proyecto)
    {
        return $proyecto->invitados()->get();
    }



}
