@extends('material.layouts.dashboard')

@section('links')
    @component('components.nav-link', ['icon' => 'fa fa-folder-open', 'link' => '#', 'title' => 'Proyectos'])
    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-percent', 'link' => route('evaluator.categorias'), 'title' => 'Categorias'])
    @endcomponent
    
@endsection