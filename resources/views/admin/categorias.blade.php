@extends('layouts.admin-dash')
@section('content')
    <div style="" >
            <h3 class="text-center">CONFIGURACIÓN DE PORCENTAJES</h3>
    </div>
       
    <div id="app">
    <div class="table-responsive">
    <table class="table table-striped table-hover table-bordered table-condensed">
        <thead>
            <th>Nombre</th>
            <th>Plataforma</th>
            <th>Modelado</th>
            <th>Despliegue</th>
            <th>Entidad/relacion</th>
            <th>Clases</th>
            <th>Actividades</th>
            <th>Uso</th>
        </thead>
        <tbody>
            <tr v-for="categoria in categorias">
                <td v-text="categoria.nombre"></td>
                <td v-text="categoria.plataforma"></td>
                <td v-text="categoria.modelado"></td>
                <td v-text="categoria.despliegue"></td>
                <td v-text="categoria.entidad_relacion"></td>
                <td v-text="categoria.clases"></td>
                <td v-text="categoria.actividades"></td>
                <td v-text="categoria.uso"></td>
            </tr>
        </tbody>
    </table>
    </div>
    </div>


@endsection
@push('functions')
    <script src="/js/categorias.js"></script>
@endpush