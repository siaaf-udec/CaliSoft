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
        return view('admin.categorias');
    }
    public function usuarios()
    {
        return view('admin.usuarios');
    }
}
