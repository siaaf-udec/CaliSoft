<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\NotaCodificacion;

class NotaScriptController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:evaluator', [
            'except' => ['index']
        ]);
    }
    public function index()
    {
        return NotaCodificacion::all();
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
