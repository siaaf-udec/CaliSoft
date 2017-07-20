<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\User;
use App\Container\Calisoft\Src\Repositories\Users;

class UserController extends Controller
{
    private $users;

    public function __construct(Users $users)
    {
        $this->middleware('auth');
        $this->middleware('role:admin')->only('index', 'store', 'destroy');
        $this->users = $users;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->validate($request, [
            'role' => 'in:admin,student,evaluator'
        ]);
        $role = $request->role;

        //Filtra por role si existe el parametro role, si no, retorna todo
        return User::when($role, function ($query) use ($role) {
            return $query->where('role', $role);
        })->paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'name'=>'required|string|max:255',
          'email'=>'required|string|email|max:255|unique:TBL_Usuarios',
          'password'=>'required|string|min:7|confirmed',
          'role'=>'required|string|in:admin,evaluator',
        ]);
        return User::create([
          'name' => $request['name'],
          'email' => $request['email'],
          'role' => $request['role'],
          'password' => bcrypt($request['password']),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();
    }

    /**
     * Retorna el proyecto del usuario logeado
     */
    public function proyecto()
    {
        return request()->user()->proyectos()->with(
            'semillero', 'categoria', 'grupoDeInvestigacion', 'usuarios'
        )->first();
    }

    /**
    *  Retorna los estudiantes que no tienen
    *  proyectos, filtra por nombre
    */
    public function searchFreeStudents(Request $request)
    {
        $this->validate($request, [ 'name' => 'string|required' ]);
        return $this->users->searchFreeStudents($request->name);
    }

    public function invitaciones()
    {
        return request()->user()->proyectos()->wherePivot('tipo', 'invitado')->get();
    }
    
}
