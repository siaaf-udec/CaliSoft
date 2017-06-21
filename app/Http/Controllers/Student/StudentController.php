<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index(){
        return view('student.student-home');
    }

    public function proyectos(){
        return view('student.student-register-pro');
    }

    public function verPorcentajes(){

        return view('student.student-ver-porcentajes');
    }

    public function subirDocumentacion(){

        return view('student.student-subir-documentacion');
    }
}

