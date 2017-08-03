<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    function index(){
        return auth()->user()->notifications;
    }

    function update($id){

    }

    function delete($id){

    }
    public function vista()
    {
        return view('calisoft.global.notificaciones');
    }
}
