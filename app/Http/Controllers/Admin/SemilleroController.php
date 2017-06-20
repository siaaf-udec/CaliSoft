<?php

namespace App\Http\Controllers\Admin;

use App\Semillero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class SemilleroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin', [
            'except' => ['index']
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Semillero::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre' => 'required|string|unique:TBL_Semilleros']);
        return Semillero::create(['nombre' => $request->nombre]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Semillero  $semillero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semillero $semillero)
    {
        $this->validate($request, [
            'nombre' => [
                'string',
                Rule::unique('TBL_Semilleros')->ignore($semillero->PK_id, 'PK_id')
            ]
        ]);

        $semillero->nombre = $request->nombre;
        $semillero->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Semillero  $semillero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semillero $semillero)
    {
        $semillero->delete();
    }
}
