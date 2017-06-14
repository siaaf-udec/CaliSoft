@extends('material.layouts.dashboard')

@section('links')
    @component('components.nav-link', ['icon' => 'fa fa-users', 'link' => '#', 'title' => 'Usuarios'])
    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-university', 'link' => '#', 'title' => 'Peticiones'])
    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-folder-open', 'link' => '#', 'title' => 'Proyectos'])
    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-pie-chart', 'link' => '#', 'title' => 'Categorias'])
    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-book', 'link' => '#', 'title' => 'Documentos'])
    @endcomponent

@endsection