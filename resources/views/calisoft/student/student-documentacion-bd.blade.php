@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', ['icon' => 'fa fa-database', 'title' => 'Documentos de Base de Datos'])
            <div id="app">
            </div>
        @endcomponent
    </div>
@endsection