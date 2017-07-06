@extends('layouts.admin-dash') @section('content')
<div class="col-md-12">
    @component('components.portlet', ['icon' => 'fa fa-folder-open', 'title' => 'Proyectos'])
    <div id="app">
        @component('components.select', [ 'name' => 'categoria', 'title' => 'Categoria', 'items' => $categorias, 'value' => 'PK_id', 'label' => 'nombre' ]) @endcomponent

        <div class="row">

            <div class="col-sm-6">
                <div class="panel panel-default" v-for="proyecto in proyectos">
                    <div class="panel-heading" style="background-color:#0E3D38;">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" @click.prevent="seleccionar(proyecto)">
                                <label class="font-white">@{{proyecto.nombre}}</label></a>
                        </h4>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">
                        <proyecto-tabla :proyectos="proyectos">
                        </proyecto-tabla>
                    </div>
                </div>

            </div>
        </div>

        @include('partials.modalHelpProyecto')
    </div>
    @endcomponent @endsection @push('styles')
    <link rel="stylesheet" href="/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css"> @endpush @push('functions')
    <script src="/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
    @endpush @push('functions')
    <script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
    <script src="/js/admin-proyectos.js"></script>
    @endpush