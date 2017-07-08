<?php
namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Proyecto;
use App\User;
use App\Notifications\Invitacion;

class InvitationController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|integer',
            'project_id' => 'required|integer',
            'invitation' => 'required|boolean'
        ]);

        $proyecto = Proyecto::findOrFail($request->project_id);
        $user = User::findOrFail($request->user_id);

        $query = $proyecto->usuarios();
        if ($request->invitation) {
            $query->attach($user->PK_id, ['tipo' => 'invitado']); //agrega la invitacion
            $user->notify(new Invitacion($request->user(), $proyecto));
        }
        else {
            $query->detach($request->user_id); // borra la invitacion
        }
    }
}
