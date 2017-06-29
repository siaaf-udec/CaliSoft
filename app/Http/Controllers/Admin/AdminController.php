<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TiposDocumento;

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

    public function tipoDocumento()
    {
        return view('admin.tipo-documento');
    }

    public function componentes(TiposDocumento $tdocumento){
        return view('admin.componentes', compact('documento'));
    }
}
