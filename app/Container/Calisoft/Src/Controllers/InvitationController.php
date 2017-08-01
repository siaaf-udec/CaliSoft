<?php
namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\Proyecto;
use App\Container\Calisoft\Src\Notifications\InvitacionEnviada;
use App\Container\Calisoft\Src\User;
use App\Container\Calisoft\Src\Requests\InvitationStoreRequest;

class InvitationController extends Controller
{

    /**
    * Crea la invitacion y envia la notificacion
    * al usuario invitado
    */
    public function store(InvitationStoreRequest $request)
    {

        $proyecto = Proyecto::findOrFail($request->project_id);
        $user = User::findOrFail($request->user_id);

        $proyecto->usuarios()->syncWithoutDetaching([ $user->PK_id => [
            'tipo' => 'invitado'
        ]]);
        $user->notify(new InvitacionEnviada($request->user(), $proyecto));
    }

    /**
    * El usuario logueado acepta la invitacion para ser integrante del proyecto
    */
    public function update(Proyecto $proyecto)
    {
        request()->user()->proyectos()->sync([ $proyecto->PK_id => [
          'tipo' => 'integrante'
      ]]);
    }

    /**
    * El usuario loguado rechaza la invitacion para ser integrante del proyecto
    */
    public function destroy(Proyecto $proyecto)
    {
        request()->user()->proyectos()->detach($proyecto->PK_id);
    }
}
