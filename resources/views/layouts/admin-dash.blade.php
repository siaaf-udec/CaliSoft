@extends('material.layouts.dashboard')

@section('links')
    @component('components.nav-link', [
        'icon' => 'fa fa-users',
        'title' => 'Usuarios',
        'link' => route('usuarios')
    ])
    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-university', 'link' => '#', 'title' => 'Peticiones'])
    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-folder-open', 'link' => '#', 'title' => 'Proyectos'])
    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-pie-chart', 'link' => route('categorias'), 'title' => 'Categorias'])
    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-book', 'link' => route('tdocumentos'), 'title' => 'Documentos'])
    @endcomponent

    @component('components.nav-link', [
        'icon' => 'fa fa-gears',
        'link' => route('semilleros'),
        'title' => 'Semilleros'
    ])
    @endcomponent

@endsection
