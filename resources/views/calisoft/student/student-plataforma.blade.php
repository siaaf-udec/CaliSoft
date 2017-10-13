@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', [
            'icon' => 'fa fa-files', 
            'title' => 'Plataforma: ' . $proyecto->nombre 
        ])
        <div id="app">
            <div class="portlet-body form">
                <div class="panel panel-info" v-for="caso in casoPrueba">
                    <div class="panel-heading">
                        <h4 class="panel-header" style="display: inline">@{{ caso.nombre }}</h4>
                        <div class="btn-group pull-right">
                            <a data-toggle="collapse" :data-target="'#'+caso.PK_id" 
                                class="btn btn-xs btn-success">Detalles</a>
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
                                            <tr v-if="caso.formulario !== ''">
                                                <td style="vertical-align: middle">Json Enviado:</td>
                                                <td style="vertical-align: middle">@{{ caso.formulario }} </td>
                                            </tr>
                                            
                                        </tbody>
                            </table>
                                <div class="form-group" v-if="caso.formulario == ''">
                                    <div class="row"> 
                                        <div class="col-sm-6">
                                            <textarea-input name="formulario" :error="formErrorsUpdate.formulario" 
                                                            v-model="fillCasoPrueba.formulario" label="Formulario" 
                                                            maxlength="500" :id="'paste'+caso.PK_id" >
                                            </textarea-input>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button @click.prevent="cadenaJson(fillCasoPrueba.formulario,caso)"  class="btn green-jungle">
                                                <i class="fa fa-message"></i>Siguiente
                                            </button>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="javascript:;" class="btn green-steel mt-clipboard" data-clipboard-paste="true" :data-paste-target="'#paste'+caso.PK_id">
                                                <i class="icon-note"></i> Pegar Json</a>
                                        </div>
                                    </div>   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>          
            </div>
            
            <!--Modal de enviar caso prueba-->
            <modal v-model="enviarModalState" title="Enviar Caso Prueba" @hide="cerrarModalEnv()" :footer="false">
                <form @submit.prevent="update(fillCasoPrueba.PK_id)" class="formarchivo" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-sm-12">
                        <textarea-input name="observacion" :error="formErrorsUpdate.descripcion" 
                                        v-model="fillCasoPrueba.observacion" label="Observación (Opcional)" 
                                        maxlength="200">
                        </textarea-input>
                    </div>
                    <div class="row" v-for="(js, index) in json" v-if="json[0]">
                        <div class="col-sm-6">
                            <select id="tidoIn" :name="'t_' + js.name" class="form-control select2" v-model="fillCasoPrueba.testInput[index]" required>
                                <option v-for="tipos in tiposInputs" v-bind:value="tipos.PK_id"> @{{ tipos.nombre }}
                                </option>
                            </select>
                        </div>
                    <div class="col-sm-6">
                        <input type="button" class="btn red-mint btn-outline btn-block sbold uppercase" 
                                :value="'Nombre: '+ js.name + ' ID:' + js.id">
                    </div>             
                </div>
                <br>
                <button type="submit" class="btn green-jungle">
                    <i class="fa fa-message"></i>Subir Caso Prueba
                </button>
                </form>
            </modal>
            <!-- Fin Modal Enviar Casoprueba -->    
        </div>
    @endcomponent
</div>
@endsection

@push('styles')

@endpush
@push('functions')
    
    <script>window.proyectoId = {{ $proyecto->PK_id }};</script>
    <script src="/js/plataforma-student.js"></script>
  
@endpush