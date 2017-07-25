<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\User;
use App\Container\Calisoft\Src\Requests\PerfilUpdateRequest;
use App\Container\Calisoft\Src\Requests\PerfilPasswordRequest;
use Hash;

class PerfilController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('calisoft.global.perfil');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function updatePassword(PerfilPasswordRequest $request)
   {
     if (Hash::check($request->PassActual, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('user')->with('status', 'Password cambiado con éxito');
            }
            else
            {
                return redirect('user/password')->with('message', 'Credenciales incorrectas');
            }
   }



    public function update(PerfilUpdateRequest $request)
    {
        $user=$request->user();
        $user->fill($request->all());
        $user->save();
        $request->session()->flash('mensaje',__('Informacion Personal Editada Correctamente'));
        return back();

    }



}
