<?php

namespace App\Http\Controllers\Student;

use App\Categorias;
use App\GrupoDeInvestigacion;
use App\Http\Controllers\Controller;
use App\Semillero;
use App\User;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.student-home');
    }

    public function proyectos()
    {
        return view('student.student-register-pro', [
            'categorias'            => Categorias::all(),
            'semilleros'            => Semillero::all(),
            'gruposDeInvestigacion' => GrupoDeInvestigacion::all(),
        ]);
    }

    public function porcentajes()
    {
        return view('student.student-ver-porcentajes');
    }

    public function documentos()
    {

        $co = auth()->user()->proyectos()->count();

        if ($co >= 1) {
            $co = auth()->user()->proyectos()->first();

            if ($co->state == 'activo') {

                return view('student.student-subir-documentacion', compact('co'));

            } else {

                return view('student.student-home');

            }

        } else {

            return view('student.student-home');
        }
    }

    public function invitaciones()
    {
        return view('student.student-invitaciones');
    }
}
