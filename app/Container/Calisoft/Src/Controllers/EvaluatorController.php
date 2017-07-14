<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EvaluatorController extends Controller
{

    public function index(){
        return view('calisoft.evaluator.evaluator-home');
    }

    public function categorias(){
        return view('calisoft.evaluator.evaluator-categoria');
    }

}
