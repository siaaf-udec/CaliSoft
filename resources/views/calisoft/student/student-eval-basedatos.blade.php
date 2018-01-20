@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', [
                'icon' => 'fa fa-database', 
                'title' => 'Evaluacion de Base de Datos', 
                //'pdf' => route('pdf.modelacion', compact('proyecto'))
        ])

        <div id="app" class="row">
           
        </div>


        @endcomponent
    </div>
@endsection
