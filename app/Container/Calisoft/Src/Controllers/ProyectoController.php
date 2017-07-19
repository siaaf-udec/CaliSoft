<?php

namespace App\Container\Calisoft\Src\Controllers;

use App\Container\Calisoft\Src\Categoria as Categoria;
use App\Container\Calisoft\Src\GrupoDeInvestigacion as Grupo;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\Notifications\ProyectoCreado;
use App\Container\Calisoft\Src\Proyecto;
use App\Container\Calisoft\Src\Semillero;
use App\Container\Calisoft\Src\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:student')->except('index');

        //$this->middleware('can:update,proyecto')->only('update');
    }

    public function index()
    {
        return Proyecto::all();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'    => 'required|string|min:5|unique:TBL_Proyectos',
            'grupo'     => 'required|integer',
            'semillero' => 'required|integer',
            'categoria' => 'required|integer',
        ]);

        // Envío de noticifación a admin BEGIN
        $admin = User::where('role', 'admin')->first();

        $admin->notify(new ProyectoCreado($admin));
        // Envío de noticifación a admin ENDING

        $request->user()->proyectos()->create([
            'nombre'                    => $request->nombre,
            'FK_GrupoDeInvestigacionId' => $request->grupo,
            'FK_SemilleroId'            => $request->semillero,
            'FK_CategoriaId'            => $request->categoria,
        ], [
            'tipo' => 'integrante',
        ]);

        return redirect()->route('student');
    }

    public function update(Request $request, Proyecto $proyecto)
    {
        $this->validate($request, [
            'nombre'                    => sprintf('string|min:5|unique:TBL_Proyectos,nombre,%d,PK_id', $proyecto->PK_id),
            'FK_CategoriaId'            => 'integer',
            'FK_SemilleroId'            => 'integer',
            'FK_GrupoDeInvestigacionId' => 'integer',
        ]);

        $proyecto->update($request->all());
    }

    public function destroy(Proyecto $proyecto){
      $proyecto->delete();
    }

    public function documentos(Proyecto $proyecto)
    {
        return $proyecto->documentos;
    }

    /**
    * Cambia el estado del proyecto como propuesta
    * @param Proyecto $proyecto
    * @return Response
    */
    public function propuesta(Proyecto $proyecto){
        $proyecto->usuarios()->wherePivot('tipo', 'invitado')->delete();
        $proyecto->state = 'propuesta';
        $proyecto->save();
        return $proyecto;
    }


    public function invitados(Proyecto $proyecto)
    {
        return $proyecto->usuarios()->wherePivot('tipo', 'invitado')->get();
    }

    public function integrantes(Proyecto $proyecto)
    {
        return $proyecto->usuarios()->wherePivot('tipo', 'integrante')->get();
    }
}
