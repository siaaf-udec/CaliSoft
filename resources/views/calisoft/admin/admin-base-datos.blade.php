@extends('layouts.dash')
@section('content')
<div class="col-md-12">
    @component('components.portlet', ['icon' => 'fa fa-database', 'title' => 'Base de Datos'])
      <div id="app">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-condensed">
                <thead>
                    <th class="text-center">Componente</th>
                    <th class="text-center">Estandar</th>
                    <th class="text-center">Valor</th>
                    <th class="text-center">Operacion</th>
                </thead>
                <tbody>
                    <tr v-for="componente in componentes" class="text-center">
                        <td v-text="componente.nombre"></td>
                        <td v-text="componente.estandar"></td>
                        <td v-text="componente.valor"></td>
                        <td>
                            <button class="editar-componente btn blue" title="Editar Componentes" @click.prevent="openEditModal(componente)">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!--inicio modal editar estandar y valor de la nomenclatura de base de datos-->
            <modal id="editar-componente" :title="'Editar Componente: ' + fillNomenclatura.nombre">
                <form @submit.prevent="update(fillNomenclatura.PK_id)">
                    <div class="row">
                        <div class="col-md-6">
                            <text-input name="estandar" :error="errorsUpdate.estandar" v-model="fillNomenclatura.estandar" 
                                label="Estandar" icon="fa fa-user" required maxlength="5"></text-input>                    
                        </div>
                        <number-input name="valor" :error="errorsUpdate.valor" v-model="fillNomenclatura.valor" label="Valor" icon="fa fa-sort-numeric-asc" min="1" max="5" required></number-input>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="submit" class="btn green-jungle">
                                <i class="fa fa-edit"></i>Editar Componente
                            </button>
                            <button type="button" class="btn red" data-dismiss="modal">
                                <i class="fa fa-ban"></i>Cancelar
                            </button>
                        </div>
                    </div>
                </form>
            </modal>
            <!--Fin Modal editar estandar y valor de la nomenclatura de base de datos-->
        </div>
      </div>
      @include('partials.modal-help-base-datos')
    @endcomponent
</div>
@endsection

@push('functions')
<script src="js/tipo-nomenclatura.js"></script>
<script src="/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
@endpush
