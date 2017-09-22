@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', [
            'icon' => 'fa fa-files', 
            'title' => 'Plataforma: ' . $proyecto->nombre 
        ])

        <div id="app">

                {{-- Boton crear caso prueba --}}
                <button type="button" data-toggle="modal" data-target="#crear-caso" class="btn green-jungle center-block">
                    <i class="fa fa-plus"></i>
                    Crear Caso Prueba
                </button>
                <br> 
                
                <div class="panel panel-info" v-for="caso in casoPrueba">
                    <div class="panel-heading">
                        <h4 class="panel-header" style="display: inline">@{{ caso.nombre }}</h4>
                        <div class="btn-group pull-right">
                            <a data-toggle="collapse" :data-target="'#'+caso.PK_id" class="btn btn-xs btn-success">Detalles</a>
                        
                            <a v-if="caso.formulario !== '-'" href="#" class="btn btn-xs btn-primary">Calificar</a>
                            <a v-else href="#" class="btn btn-xs btn-danger" disabled>Calificar</a>
                            <a @click.prevent="destroy(caso)" class="btn btn-xs btn-danger" >Eliminar</a>
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

                            <span v-if="caso.formulario == '-'" class="label label-sm label-danger"> El estudiante no a subido el Caso Prueba </span>
                            
                        </div>
                    </div>
                </div>          

                <!--Modal crear caso prueba-->
                <modal id="crear-caso" title="Crear Caso Prueba">
                    <form @submit.prevent="store()" id="caso-create">
                        <div class="row">
                            <div class="col-sm-6">
                                <textarea-input name="nombre" :error="formErrors.nombre" v-model="newCasoPrueba.nombre" label="Nombre" maxlength="200" required></textarea-input>
                                <textarea-input name="proposito" :error="formErrors.proposito" v-model="newCasoPrueba.proposito" label="Proposito" required></textarea-input>
                                <textarea-input name="alcance" :error="formErrors.alcance" v-model="newCasoPrueba.alcance" label="Alcance" required></textarea-input>
                               
                            </div>  
                            <div class="col-sm-6">
                                <textarea-input name="resultado_esperado" v-model="newCasoPrueba.resultado_esperado" label="Resultado esperado" required></textarea-input>
                                <textarea-input name="criterios" v-model="newCasoPrueba.criterios" label="Criterios" required></textarea-input>
                                <select-input v-model="newCasoPrueba.prioridad" name="prioridad" label="Prioridad" required>    
                                    <option value="alta">Alta</option>
                                    <option value="media">Media</option>
                                    <option value="baja">Baja</option>
                                </select-input>
                                
                                <div class="form-group">
                                    <label >Límite</label>
                                    <div >
                                        <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                            <input type="text" name="limite" v-model="newCasoPrueba.limite" class="form-control" readonly>
                                                <span class="input-group-btn"> 
                                                    <button class="btn default" type="button">
                                                        <i class="fa fa-calendar"></i>
                                                    </button>
                                                </span>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        

                        <div class="form-group modal-footer">
                            <button type="submit" class="btn green-jungle">
                                <i class="fa fa-plus"></i>Crear
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="fa fa-ban"></i>Cancelar
                            </button>
                        </div>
                    </form>
                </modal>
                <!-- End modal crear usuarios-->
                
                
            </div>
        
            
        @endcomponent
    </div>
@endsection

@push('styles')  
    <link href="/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
@endpush

    
@push('functions')
    <script src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
            
    <script>window.proyectoId = {{ $proyecto->PK_id }};</script>
    <script src="/js/plataforma.js"></script>

    
@endpush