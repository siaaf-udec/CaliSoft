<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\TipoNomenclatura;
use App\Container\Calisoft\Src\Requests\TipoNomenclaturaUpdateRequest;

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
        return TipoNomenclatura::all();
    }

    
    public function update(TipoNomenclaturaUpdateRequest $request, $id)
    {
        $basedato = TipoNomenclatura::find($id);
        $basedato->estandar = $request->estandar;
        $basedato->valor = $request->valor;
        $basedato->save();       
    }

}
