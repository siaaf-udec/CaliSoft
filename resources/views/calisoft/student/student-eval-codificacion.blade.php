@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', [
                'icon' => 'fa fa-code', 
                'title' => 'Evaluacion de Codificación', 
                'pdf' => route('pdf.scripts',compact('proyecto'))
        ])

        <div id="app" class="row">
           
        </div>


        @endcomponent
    </div>
@endsection