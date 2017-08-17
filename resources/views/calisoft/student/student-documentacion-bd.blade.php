@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', ['icon' => 'fa fa-database', 'title' => 'Documento de Base de Datos'])
            <div id="app">
            </div>
        @endcomponent
    </div>
@endsection