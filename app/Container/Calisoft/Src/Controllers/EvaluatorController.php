<?php
namespace App\Container\Calisoft\Src\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\Proyecto;
use App\Container\Calisoft\Src\Script;
use App\Container\Calisoft\Src\Documento;


class EvaluatorController extends Controller
{

    public function categorias()
    {
        return view('calisoft.evaluator.evaluator-categoria');
    }

    public function documentacion(Proyecto $proyecto)
    {
        return view('calisoft.evaluator.evaluator-modelacion', compact('proyecto'));
    }

    public function plataforma(Proyecto $proyecto)
    {
        return view('calisoft.evaluator.evaluator-plataforma', compact('proyecto'));
    }

    public function evaluar(Documento $documento)
    {
        return view('calisoft.evaluator.evaluator-docs', compact('documento'));
    }
    public function codificacion(Proyecto $proyecto)
    {
        return view('calisoft.evaluator.evaluator-codificacion', compact('proyecto'));
    }

    public function evaluarScripts(Script $script)
    {
        return view('calisoft.evaluator.evaluator-scripts',compact('script'));
    }
}
