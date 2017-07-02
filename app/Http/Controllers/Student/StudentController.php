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


    /*
    public function subirDocumentacion(){

        $idFK= User::Where('PK_id',Auth::id())->first();
      
        return view('student.student-subir-documentacion')->with('idFK',$idFK);
    }

    public function documentosShow($idProyecto){

        return Documentos::Where('FK_ProyectoId',$idProyecto)->get();
    }
    */
    public function mensaje(){
        return view('student.student-mensaje');
    }

    //public function documentos(Documentos $documento){
      //  return view('student.student-subir-documentacion', compact('documento'));
    //}
}

