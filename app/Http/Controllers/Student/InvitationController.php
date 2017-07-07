<?php
namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $query = $proyecto->invitados();
        if ($request->invitation) {
            $query->attach($request->user_id); //agrega la invitacion

        }
        else {
            $query->detach($request->user_id); // borra la invitacion

        }
    }
}
