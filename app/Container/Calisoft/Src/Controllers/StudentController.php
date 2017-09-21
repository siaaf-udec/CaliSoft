<?php
namespace App\Container\Calisoft\Src\Controllers;

use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\Categoria;
use App\Container\Calisoft\Src\GrupoDeInvestigacion;
use App\Container\Calisoft\Src\Semillero;
use App\Container\Calisoft\Src\Proyecto;

class StudentController extends Controller
{

    function __construct()
    {
        $this->middleware('can:upload,App\Proyecto')
            ->only('documentos', 'modelobd', 'documentosCoddificacion', 'documentosBd');
    }

    public function proyectos()
    {
        return view('calisoft.student.student-register-pro', [
            'categorias' => Categoria::all(),
            'semilleros' => Semillero::all(),
            'gruposDeInvestigacion' => GrupoDeInvestigacion::all(),
        ]);
    }

    //Cambiar
    public function documentos()
    {
        $co = auth()->user()->proyectos()->first();
        return view('calisoft.student.student-documentacion', compact('co'));
    }

    public function invitaciones()
    {
        return view('calisoft.student.student-invitaciones');
    }

    public function modelobd()
    {
        return view('calisoft.student.student-modelobd');
    }

    public function documentosCodificacion()
    {
        return view('calisoft.student.student-codificacion');
    }

    public function documentosBd()
    {
        return view('calisoft.student.student-bd');
    }

    public function plataforma()
    {
        $proyecto = auth()->user()->proyectos()->first();
        $casos = $proyecto->casoPruebas()->get();
        return view('calisoft.student.student-plataforma', compact('proyecto','casos'));
    }
}

    