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
                        
                            <a href="#" class="btn btn-xs btn-primary">Calificar</a>
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
                                        </tbody>
                            </table>

                            <span v-if="caso.entrega == 0" class="label label-sm label-danger"> El estudiante no a subido el Caso Prueba </span>
                            
                        </div>
                    </div>
                </div>          

                <!--Modal crear caso prueba-->
                <modal id="crear-caso" title="Crear Caso Prueba">
                    <form @submit.prevent="store()" id="caso-create">
                        <div class="row">
                            <div class="col-sm-6">
                                <text-input name="nombre" v-model="newCasoPrueba.nombre" label="Nombre" required></text-input>
                                <text-input name="proposito" v-model="newCasoPrueba.proposito" label="Proposito" required></text-input>
                                <text-input name="alcance" v-model="newCasoPrueba.alcance" label="Alcance" required></text-input>
                                
                            </div>  
                            <div class="col-sm-6">
                                <text-input name="resultado_esperado" v-model="newCasoPrueba.resultado_esperado" label="Resultado esperado" required></text-input>
                                <text-input name="criterios" v-model="newCasoPrueba.criterios" label="Criterios" required></text-input>
                                <select-input v-model="newCasoPrueba.prioridad" name="prioridad" label="Prioridad" required>    
                                    <option value="alta">Alta</option>
                                    <option value="media">Media</option>
                                    <option value="baja">Baja</option>
                                </select-input>
                                <label>Limite: </label>
                                <input type="date"  v-model="newCasoPrueba.limite" name="limite">
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

@push('functions')
    <script>window.proyectoId = {{ $proyecto->PK_id }};</script>
    <script src="/js/plataforma.js"></script>

    
@endpush