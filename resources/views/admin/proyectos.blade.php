@extends('layouts.admin-dash') @section('content')
<div class="col-md-12">
    @component('components.portlet', ['icon' => 'fa fa-folder-open', 'title' => 'Proyectos'])
    <div id="app">
        @component('components.select', [ 'name' => 'categoria', 'title' => 'Categoria', 'items' => $categorias, 'value' => 'PK_id', 'label' => 'nombre' ]) @endcomponent

        <div class="row">

            <div class="col-sm-6">
                <div class="list-group">
                    <a v-for="proyecto in proyectos " href="#" class="list-group-item" @click="seleccionar(proyecto)">@{{proyecto.nombre}}</a>
                </div>
                <!--Inicio Paginacion Proyecto-->
                <center>
                    <ul class="pagination pager pull-center">
                      <li>
                        <a :class="{disabled: !paginacion.prev_page_url}" @click="refresh(paginacion.prev_page_url)">
                          <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li v-for="index in paginacion.last_page">
                        <a @click="refresh('/api/proyectos', { page: index })">@{{index}}</a>
                      </li>
                      <li>
                        <a :class="{disabled: !paginacion.next_page_url}" @click="refresh(paginacion.next_page_url)">
                          <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                    </center>
                    <!--Fin paginacion proyecto-->                  
            </div>

            <div class="col-sm-6" v-if="seleccion.nombre">

                <proyecto-tabla :proyecto="seleccion">
                </proyecto-tabla>


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
