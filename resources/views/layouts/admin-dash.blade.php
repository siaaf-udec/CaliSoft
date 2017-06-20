@extends('material.layouts.dashboard')

@section('links')
    @component('components.nav-dropdown', ['icon' => 'fa fa-users', 'link' => '#', 'title' => 'Usuarios'])

                @component('components.nav-link', ['icon' => 'fa fa-users', 'link' => route('register-evaluador'), 'title' => 'Registrar evaluadores'])
                @endcomponent

                @component('components.nav-link', ['icon' => 'fa fa-bar-chart-o', 'link' => '#', 'title' => 'Lo que quieran poner'])
                @endcomponent

                @component('components.nav-link', ['icon' => 'fa fa-cubes', 'link' => '#', 'title' => 'Lo que quieran poner'])
                @endcomponent

    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-university', 'link' => '#', 'title' => 'Peticiones'])
    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-folder-open', 'link' => '#', 'title' => 'Proyectos'])
    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-pie-chart', 'link' => route('categorias'), 'title' => 'Categorias'])
    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-book', 'link' => '#', 'title' => 'Documentos'])
    @endcomponent

    @component('components.nav-link', [
        'icon' => 'fa fa-gears',
        'link' => route('semilleros'),
        'title' => 'Semilleros'])
    @endcomponent

@endsection
