<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Categorias;
use App\Semillero;
use App\GrupoDeInvestigacion;

class StudentController extends Controller
{
    public function index(){
        return view('student.student-home');
    }

    public function proyectos(){
        return view('student.student-register-pro', [
            'categorias' => Categorias::all(),
            'semilleros' => Semillero::all(),
            'gruposDeInvestigacion' => GrupoDeInvestigacion::all()
        ]);
    }

    public function porcentajes(){
        return view('student.student-ver-porcentajes');
    }

    public function documentos(){
        return view('student.student-subir-documentacion');
    }

    public function invitaciones(){
        return view('student.student-invitaciones');
    }
}
