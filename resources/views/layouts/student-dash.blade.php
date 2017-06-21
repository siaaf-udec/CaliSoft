@extends('material.layouts.dashboard')

@section('links')
    @component('components.nav-link', ['icon' => 'fa fa-book', 'link' => '#', 'title' => 'Documentacion'])
    @endcomponent

    @component('components.nav-dropdown', ['icon' => 'fa fa-check', 'title' => 'Evaluación'])

        @component('components.nav-link', ['icon' => 'fa fa-users', 'link' => '#', 'title' => 'Evaluadores'])
        @endcomponent

        @component('components.nav-link', ['icon' => 'fa fa-bar-chart-o', 'link' => '#', 'title' => 'Modelado'])
        @endcomponent

        @component('components.nav-link', ['icon' => 'fa fa-cubes', 'link' => '#', 'title' => 'Plataforma'])
        @endcomponent



    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-percent', 'link' => Route('porcentajes'),'title' => 'Porcentajes'])
    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-pencil-square', 'link' => Route('proyectos'), 'title' => 'Registro Proyecto'])
    @endcomponent

@endsection
