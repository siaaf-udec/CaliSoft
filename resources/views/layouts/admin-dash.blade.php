@extends('material.layouts.dashboard')

@section('links')
    @component('components.nav-link', ['icon' => 'fa fa-amazon', 'link' => '#', 'title' => 'Amazon'])
    @endcomponent
@endsection