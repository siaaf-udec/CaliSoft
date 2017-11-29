@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', [
            'icon' => 'fa fa-files-o', 
            'title' => 'Nomenclatura: ' . $proyecto->nombre
            ])
            <div id="app">               
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%">
                        <thead>
                            <th class="text-center">Nombre Del Archivo</th>
                            <th class="text-center">Base de Datos</th>
                        </thead>
                        <tbody >
                            <tr v-if="basedato" class="text-center">
                                <td>@{{basedato.url}}</td>
                                <td>@{{basedato.tipobd.nombre}}</td>
                            </tr>
                        </tbody>
                    </table>                    
                </div>
                <div class=row>
                    <div class="col-md-6">
                        <h5><center><strong>Codigo SQL</strong></center></h5>
                        <code-preview url="{{$proyecto->sql->url}}" prefix="/api/sql/preview/" mode="text/x-sql"></code-preview>                  
                    </div>
                    <div class="col-md-6">
                        <h5><center><strong>Información</strong></center></h5>
                        <table class="table table-striped table-bordered table-hover dt-responsive">
                            <thead>
                                <th>Componente</th>
                                <th>Cantidad</th>
                                <th>Calificación</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>                
        @endcomponent  
    </div>
@endsection
@push('functions')
    <script>window.proyectoId = "{{ $proyecto->PK_id }}"</script>
    <script src="/assets/global/plugins/jquery.media.js"></script>
    <script src="/js/base-datos.js"></script>
@endpush