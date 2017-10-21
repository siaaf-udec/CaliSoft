@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', [
            'icon' => 'fa fa-files', 
            'title' => 'Escenario prueba: ' . $casoPrueba->nombre 
        ])

            <div id="app">
                {{-- Boton crear escenario prueba --}}
                <button type="button" data-toggle="modal" data-target="#crear-escenario" class="btn green-jungle center-block">
                    <i class="fa fa-plus"></i>
                    Crear Escenario Prueba
                </button>
                <br>
                
                <table class="table table-striped table-bordered table-hover" id="sample">
                    <tbody>
                        <tr >
                            <td  style="vertical-align: middle">Proposito:</td>
                            <td style="vertical-align: middle">{{ $casoPrueba->formulario }} </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <div id="pulsate-regular" style="padding:5px;"> Error </div>
                <br>
                <br>
                <br>
    
                
                <div id="pulsate-regular2" style="padding:5px;"> Good Boy </div>
                
                <br>
                <br>
                <br>

                <input-list :formulario="json" :tipos="tiposInputs" ></input-list>
                
            </div>
        
            
        @endcomponent
    </div>
@endsection

@push('styles')  
    <link href="/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css">

    
@endpush

    
@push('functions')
    
            
    <script src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>

    <script src="/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery-bootpag/jquery.bootpag.min.js" type="text/javascript"></script>
    <script src="/assets/pages/scripts/ui-general.min.js" type="text/javascript"></script>
            
    
    <script>window.casoPruebaId = {{ $casoPrueba->PK_id }};</script>
    <script>window.proyectoId = {{ $proyecto->PK_id }};</script>
    <script src="/js/escenario.js"></script>
@endpush