@extends('material.layouts.dashboard')

@section('links')
    @component('components.nav-link', ['icon' => 'fa fa-book', 'link' => route('documentacion'), 'title' => 'Documentacion'])
    @endcomponent

    @component('components.nav-dropdown', ['icon' => 'fa fa-check', 'title' => 'Evaluación'])

        @component('components.nav-link', ['icon' => 'fa fa-users', 'link' => '#', 'title' => 'Evaluadores'])
        @endcomponent

        @component('components.nav-link', ['icon' => 'fa fa-bar-chart-o', 'link' => '#', 'title' => 'Modelado'])
        @endcomponent

        @component('components.nav-link', ['icon' => 'fa fa-cubes', 'link' => '#', 'title' => 'Plataforma'])
        @endcomponent

    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-percent', 'link' => route('porcentajes'),'title' => 'Porcentajes'])
    @endcomponent

    @can('create', 'App\Proyecto')
        @component('components.nav-link', [
            'icon' => 'fa fa-pencil-square',
            'title' => 'Registro Proyecto',
            'link' => route('proyectos'),
        ])
        @endcomponent
    @endcan


@endsection
