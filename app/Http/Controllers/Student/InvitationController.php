<?php
namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Proyecto;
use App\User;
use App\Notifications\Invitacion;

class InvitationController extends Controller
{

    /**
    * Crea la invitacion y envia la notificacion
    * al usuario invitado
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|integer',
            'project_id' => 'required|integer'
        ]);

        $proyecto = Proyecto::findOrFail($request->project_id);
        $user = User::findOrFail($request->user_id);

        $proyecto->usuarios()->attach($user->PK_id, ['tipo' => 'invitado']);
        $user->notify(new Invitacion($request->user(), $proyecto));

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
