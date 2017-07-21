<?php

namespace App\Container\Calisoft\Src\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\Role;

class RoleController extends Controller
{

    function __construct(){
      $this->middleware('role:admin');
    }

    public function index(){
      return Role::all();
    }

}
