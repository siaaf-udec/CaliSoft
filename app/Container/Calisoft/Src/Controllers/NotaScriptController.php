<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\NotaCodificacion;
use App\Container\Calisoft\Src\Repositories\Evaluations;
use App\Container\Calisoft\Src\Script;
use App\Container\Calisoft\Src\Requests\NotaScriptUpdateRequest;


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

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(NotaScriptUpdateRequest $request, Script $script)
    {
        $script->items()->updateExistingPivot($request->itemId,[
            'nota'=>$request->nota,
            


        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
