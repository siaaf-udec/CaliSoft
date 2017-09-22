@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', [
            'icon' => 'fa fa-files', 
            'title' => 'Plataforma: ' . $proyecto->nombre 
        ])
        <button class="btn green-sharp btn-large" data-toggle="confirmation" data-original-title="¿Esta seguro? una vez, enviado no se podrá modificar"
             title="">Subir Caso Prueba</button>
        <div id="app">
        <button class="btn green-sharp btn-large" data-toggle="confirmation" data-original-title="¿Esta seguro? una vez, enviado no se podrá modificar"
             title="">Subir Caso Prueba</button>
                <br> 

                <div class="panel panel-info" v-for="caso in casoPrueba">
                <button class="btn green-sharp btn-large" data-toggle="confirmation" data-original-title="¿Esta seguro? una vez, enviado no se podrá modificar"
             title="">Subir Caso Prueba</button>
                    <div class="panel-heading">
                        <h4 class="panel-header" style="display: inline">@{{ caso.nombre }}</h4>
                        <div class="btn-group pull-right">
                            <a data-toggle="collapse" :data-target="'#'+caso.PK_id" class="btn btn-xs btn-success">Detalles</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div :id="caso.PK_id" class="collapse">
                            <table class="table table-striped table-bordered table-hover" id="sample">
                                        <tbody>
                                            <tr>
                                                <td style="vertical-align: middle">Proposito:</td>
                                                <td style="vertical-align: middle">@{{ caso.proposito }} </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle">Alcance:</td>
                                                <td style="vertical-align: middle">@{{ caso.alcance }} </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle">Resultado Esperado:</td>
                                                <td style="vertical-align: middle">@{{ caso.resultado_esperado }} </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle">Criterios:</td>
                                                <td style="vertical-align: middle">@{{ caso.criterios }} </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle">Prioridad:</td>
                                                <td style="vertical-align: middle">@{{ caso.prioridad }} </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle">Estado:</td>
                                                <td style="vertical-align: middle">@{{ caso.estado }} </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle">Plazo:</td>
                                                <td style="vertical-align: middle">@{{ caso.limite }} </td>
                                            </tr>
                                            <tr v-if="caso.formulario !== '-'">
                                                <td style="vertical-align: middle">Archivo subido:</td>
                                                <td style="vertical-align: middle">@{{ caso.formulario }} </td>
                                            </tr>
                                            
                                        </tbody>
                            </table>
                            <form method="POST"  :action="'/api/enviarCasoPrueba/'+caso.PK_id,caso" 
                                class="formarchivo" enctype="multipart/form-data" v-if="caso.formulario == '-'">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="textarea">(Opcional) Observación: </label>
                                            <textarea id="textarea" name="observacion" rows="3" style="width: calc(100% - 45px);  height: auto;"></textarea>
                                        </div>
                                        <div class="col-sm-4">
                                         @component('components.fileinput',[
                                            'icon'=>'fa fa-file',
                                            'atributo'=>'required',
                                            'title1' => 'Caso Prueba',
                                            'title2' => 'Seleccionar',
                                            'nombre' => 'formulario',
                                            ])
                                        @endcomponent
                                        </div>
                                        
                                    </div>                 
                                    <button type="submit" class="btn green-jungle">
                                        <i class="fa fa-message"></i>Subir Caso Prueba
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>          
 
            </div>
        
            
        @endcomponent
    </div>
@endsection

@push('styles')

    <link href="/assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        

@endpush
@push('functions')
    <script src="/assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
    <script src="/assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script>window.proyectoId = {{ $proyecto->PK_id }};</script>
    <script src="/js/plataforma-student.js"></script>
            

    
@endpush