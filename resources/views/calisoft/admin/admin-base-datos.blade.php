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
                            <button class="editar-modal btn blue" title="Editar Componentes">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!--inicio modal editar estandar y valor de la nomenclatura de base de datos-->
            
        </div>
      </div>
    @endcomponent
</div>
@endsection

@push('functions')
<script src="js/tipo-nomenclatura.js"></script>
<script src="/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
@endpush
