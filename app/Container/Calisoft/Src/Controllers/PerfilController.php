<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\User;
use App\Container\Calisoft\Src\Requests\PerfilUpdateRequest;

class PerfilController extends Controller
{
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
