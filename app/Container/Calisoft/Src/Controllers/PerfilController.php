<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\User;
use App\Container\Calisoft\Src\Requests\PerfilUpdateRequest;

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
   public function updatePassword(PerfilUpdateRequest $request)
   {

   }



    public function update(PerfilUpdateRequest $request)
    {
        $user=$request->user();
        $user->fill($request->all());
        $user->save();
        return back();

    }



}
