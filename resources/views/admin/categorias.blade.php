@extends('layouts.admin-dash')
@section('content')
    <div class="form-group row add" >
    <div class="col-md-12">
            <h3 class="text-center">CONFIGURACIÓN DE PORCENTAJES</h3>
    </div>
    <div class="col-md-12">
    <button type="button" data-toggle="modal" data-target="#crear-categoria" class="btn btn-primary">
    Crear Nueva Categoría
    </button>
    </div>
    </div>
       
    <div id="app">
    <div class="table-responsive">
    <table class="table table-striped table-hover table-bordered table-condensed">
        <thead>
            <th>Nombre</th>
            <th>Plataforma</th>
            <th>Modelado</th>
            <th>Despliegue</th>
            <th>Entidad/relación</th>
            <th>Clases</th>
            <th>Actividades</th>
            <th>Uso</th>
            <th>Operaciones</th>
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
                <td>
                <button class="editar-modal btn btn-warning" @click.prevent="editarCategoria(categoria)">
                <span class="glyphicon glyphicon-edit"></span>Editar
                </button>
                </td>
                <td>
                <button class="editar-modal btn btn-danger" @click.prevent="eliminarCategoria(categoria)">
                <span class="glyphicon glyphicon-trash"></span>Eliminar
                </button>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
    </div>


@endsection
@push('functions')
    <script src="/js/categorias.js"></script>
@endpush