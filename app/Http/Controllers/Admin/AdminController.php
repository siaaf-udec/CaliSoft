<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categorias As Categoria;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin-home');
    }

    public function semilleros()
    {
        return view('admin.semilleros');
    }
    public function categorias()
    {
        $catego=Categoria::pluck('nombre','PK_id');
        return view('admin.categorias',compact('catego'));
    }
    public function usuarios()
    {
        return view('admin.usuarios');
    }
}
