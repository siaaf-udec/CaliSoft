<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\Proyecto;

class EvaluatorController extends Controller
{


    public function categorias(){
        return view('calisoft.evaluator.evaluator-categoria');
    }

    public function documentacion(Proyecto $proyecto){
        return view('calisoft.evaluator.evaluator-modelacion', [
            'documentos' => $proyecto->documentos()
        ]);
    }

}
