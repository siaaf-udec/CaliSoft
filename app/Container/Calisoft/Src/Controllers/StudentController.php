<?php

namespace App\Container\Calisoft\Src\Controllers;

use App\Http\Controllers\Controller;
use App\Categorias;
use App\GrupoDeInvestigacion;
use App\Semillero;

class StudentController extends Controller
{
    public function index()
    {
        return view('calisoft.student.student-home');
    }

    public function proyectos()
    {
        return view('calisoft.student.student-register-pro', [
            'categorias'            => Categorias::all(),
            'semilleros'            => Semillero::all(),
            'gruposDeInvestigacion' => GrupoDeInvestigacion::all(),
        ]);
    }

    public function porcentajes()
    {
        return view('calisoft.student.student-ver-porcentajes');
    }

    public function documentos()
    {

        $co = auth()->user()->proyectos()->count();

        if ($co >= 1) {
            $co = auth()->user()->proyectos()->first();

            if ($co->state == 'activo') {

                return view('calisoft.student.student-subir-documentacion', compact('co'));

            } else {

                return view('calisoft.student.student-home');

            }

        } else {

            return view('calisoft.student.student-home');
        }
    }

    public function invitaciones()
    {
        return view('calisoft.student.student-invitaciones');
    }
}
