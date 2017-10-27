<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\NotaCodificacion;
use App\Container\Calisoft\Src\Repositories\Evaluations;
use App\Container\Calisoft\Src\Script;


class NotaScriptController extends Controller
{
    public function __construct(Evaluations $evaluations)
    {
        $this->evaluations=$evaluations;
        $this->middleware('auth');
        $this->middleware('role:evaluator', [
            'except' => ['index']
        ]);
    }
    public function show(Script $script)
    {
        return $this->evaluations->forScript($script);
    }

    
    public function store(Request $request)
    {
        return NotaCodificacion::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, NotaCodificacion $script)
    {
        $script->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
