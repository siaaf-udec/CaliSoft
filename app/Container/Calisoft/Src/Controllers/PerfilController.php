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
     $user = auth()->user();

     if (Hash::check($request->pass_actual, $user->password)){
                $user->password=bcrypt($request->pass_new);
                $user->save();
                $request->session()->flash('mensaje',__('Contraseñas actulizadas correctamente'));
                return back();
            }
            else
             {
               $request->session()->flash('error',__('Error al cambiar contraseñas'));
               return back();
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
