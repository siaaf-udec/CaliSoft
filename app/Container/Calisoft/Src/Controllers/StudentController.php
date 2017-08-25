<?php
namespace App\Container\Calisoft\Src\Controllers;

use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\Categoria;
use App\Container\Calisoft\Src\GrupoDeInvestigacion;
use App\Container\Calisoft\Src\Semillero;

class StudentController extends Controller
{

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
        if($co->state != "activo"){
            return view('calisoft.student.student-acceso-denegado', compact('co'));
        }else{
            return view('calisoft.student.student-documentacion', compact('co'));
        }   
       
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
        return view('calisoft.student.student-documentacion-codificacion');
    }

    public function documentosBd()
    {
        return view('calisoft.student.student-documentacion-bd');
    }
}

    