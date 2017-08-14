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
                    <tr  class="text-center" v-for="componente in componentes">
                        <td v-text="componente.nombre"></td>
                        <td v-text="componente.estandar"></td>
                        <td v-text="componente.valor"></td>
                        <td>
                            <button class="editar-modal btn btn-danger" title="Eliminar Usuario">
                            <!--<button class="editar-modal btn btn-danger" @click.prevent="destroy(user)">-->
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
    @endcomponent
</div>
@endsection
