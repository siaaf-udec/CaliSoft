<?php

namespace App\Container\Calisoft\Src\Controllers;

use App\Container\Calisoft\Src\Requests\PerfilFotoRequest;
use App\Container\Calisoft\Src\Requests\PerfilPasswordRequest;
use App\Container\Calisoft\Src\Requests\PerfilUpdateRequest;
use App\Container\Calisoft\Src\User;
use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
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

        if (Hash::check($request->pass_actual, $user->password)) {
            $user->password = bcrypt($request->pass_new);
            $user->save();
            $request->session()->flash('mensaje', __('Contraseñas actualizadas correctamente'));
        } else {
            $request->session()->flash('error', __('Error al cambiar contraseñas'));
        }
        return back();
    }

    public function update(PerfilUpdateRequest $request)
    {
        $user = $request->user();
        $user->fill($request->all());
        $user->save();
        $request->session()->flash('mensaje', __('Informacion Personal Editada Correctamente'));
        return back();

    }

    public function fotoUp(PerfilFotoRequest $request)
    {
        $user = $request->user();
        $user->foto = $request->commit($user->foto); //actualiza el archivo
        $user->save();
        $request->session()->flash('mensaje', __('Su foto se actualizó correctamente'));
        return back();
    }

}
