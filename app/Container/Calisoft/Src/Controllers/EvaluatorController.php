<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EvaluatorController extends Controller
{

    public function categorias(){
        return view('calisoft.evaluator.evaluator-categoria');
    }

}
