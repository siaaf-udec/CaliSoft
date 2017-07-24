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
use App\Container\Calisoft\Src\Requests\ProyectoStoreRequest;
use App\Container\Calisoft\Src\Requests\ProyectoUpdateRequest;

class ProyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:student')->except('index', 'aceptar', 'destroy');
        $this->middleware('role:admin')->only('index', 'aceptar');
        //$this->middleware('can:update,proyecto')->only('update');
    }

    public function index()
    {
        return Proyecto::with('semillero', 'categoria', 'grupoDeInvestigacion', 'usuarios')
            ->where('state', '<>', 'creacion')
            ->paginate(9);
    }

    public function store(ProyectoStoreRequest $request)
    {
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

        return redirect()->route('home');
    }

    public function update(ProyectoUpdateRequest $request, Proyecto $proyecto)
    {
        $proyecto->update($request->all());
    }

    public function destroy(Proyecto $proyecto)
    {
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
    public function propuesta(Proyecto $proyecto)
    {
        $proyecto->usuarios()->wherePivot('tipo', 'invitado')->delete();
        $proyecto->state = 'propuesta';
        $proyecto->save();
        return $proyecto;
    }

    public function aceptar(Proyecto $proyecto)
    {
        $proyecto->state = 'activo';
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
