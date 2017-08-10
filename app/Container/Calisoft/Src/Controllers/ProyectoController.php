<?php

namespace App\Container\Calisoft\Src\Controllers;

use App\Container\Calisoft\Src\Notifications\ProyectoCreado;
use App\Container\Calisoft\Src\Notifications\ProyectoDenegado;
use App\Container\Calisoft\Src\Notifications\ProyectoAsignado;

use App\Container\Calisoft\Src\Requests\ProyectoStoreRequest;
use App\Container\Calisoft\Src\Requests\ProyectoUpdateRequest;
use App\Container\Calisoft\Src\Requests\ProyectoDenegadoRequest;

use App\Container\Calisoft\Src\Requests\ProyectoAsignarRequest;
use App\Container\Calisoft\Src\User;
use App\Container\Calisoft\Src\Proyecto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:student')->except('index', 'aceptar', 'destroy', 'asignar');
        $this->middleware('role:admin')->only('index', 'aceptar', 'asignar');
        //$this->middleware('can:update,proyecto')->only('update');
    }

    public function index()
    {
        return Proyecto::with('semillero', 'categoria', 'grupoDeInvestigacion', 'usuarios')
            ->where('state', '<>', 'creacion')
            ->get();
    }

    public function store(ProyectoStoreRequest $request)
    {

        $request->user()->proyectos()->create([
            'nombre'                    => $request->nombre,
            'FK_GrupoDeInvestigacionId' => $request->grupo,
            'FK_SemilleroId'            => $request->semillero,
            'FK_CategoriaId'            => $request->categoria,
        ], [
            'tipo' => 'integrante'
        ]);

        return redirect()->route('home');
    }

    public function update(ProyectoUpdateRequest $request, Proyecto $proyecto)
    {
        $proyecto->update($request->all());
    }

    public function destroy(Proyecto $proyecto, ProyectoDenegadoRequest $request)
    {
        //Envía notificación a usuario de eliminación junto con las razones
        $usuarios = $proyecto->usuarios()->get();
        Notification::send($usuarios, new ProyectoDenegado($proyecto->nombre, $request->text));
        
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

        // Envío de noticifación a admin BEGIN
        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new ProyectoCreado($proyecto));

        return $proyecto;
    }

    public function aceptar(Proyecto $proyecto)
    {
        $proyecto->state = 'activo';
        $proyecto->save();
        return $proyecto;
    }

    public function asignar(ProyectoAsignarRequest $request, Proyecto $proyecto){

        $proyecto->usuarios()->syncWithoutDetaching([ $request->user_id => [ 
            'tipo' => 'evaluador'
        ]]);
        //Notificación 
        $user = User::findOrFail($request->user_id);
        $user->notify(new ProyectoAsignado($proyecto));

        return $proyecto->usuarios;
    }
}
