@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', ['icon' => 'fa fa-code', 'title' => 'Documentos de Codificación'])
            <div id="app">
            </div>
        @endcomponent
    </div>
@endsection