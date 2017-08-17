<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\BaseDatos;
use App\Container\Calisoft\Src\Requests\BaseDatosUpdateRequest;

class BaseDatosController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin', [
            'except' => ['index']
        ]);
    }

    public function index()
    {
        return BaseDatos::all();
    }

    
    public function update(BaseDatosUpdateRequest $request, $id)
    {
        $basedato = BaseDatos::find($id);
        $basedato->estandar = $request->estandar;
        $basedato->valor = $request->valor;
        $basedato->save();       
    }

}
