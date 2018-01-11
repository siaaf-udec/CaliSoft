<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\Repositories\Evaluations;
use App\Container\Calisoft\Src\ArchivoSql;

class NotaFileBDController extends Controller
{
    public function __construct(Evaluations $evaluations)
    {
        $this->evaluations=$evaluations;
        $this->middleware('auth');
        $this->middleware('role:evaluator', [
            'except' => ['index']
        ]);
    }

    public function show(ArchivoSql $sql)
    {
       return $this->evaluations->forSql($sql);
    }
    
    /**
     * Actualiza la nota del sql
     */
    
    public function update()
    {
       
        
    }
}
