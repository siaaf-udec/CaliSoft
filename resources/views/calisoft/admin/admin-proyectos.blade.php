@extends('layouts.admin-dash') @section('content')
<div class="col-md-12">
    @component('components.portlet', ['icon' => 'fa fa-folder-open', 'title' => 'Proyectos'])
    <div id="app">
        <div class="row ">
          <div class="form-group col-md-4 col-xs-12">
            <bs-select id="categoria" title="Categorias" v-model="categoriaId">
              <option value="">Todos</option>
              @foreach($categorias as $categoria)
                <option value="{{$categoria->PK_id}}">{{$categoria->nombre}}</option>
              @endforeach
            </bs-select>
          </div>
        </div>
        <div class="row">

            <div class="col-sm-6">
                <div class="list-group ">
                    <a v-for="proyecto in proyectos " href="#" class="list-group-item" @click="seleccionar(proyecto)">@{{proyecto.nombre}}</a>
                </div>
                <!--Inicio Paginacion Proyecto-->
                <center>
                    <ul class="pagination pager pull-center" v-show="paginacion.last_page > 1">
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
    @endcomponent
  </div>
    @endsection
    @push('styles')
    <link rel="stylesheet" href="/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css">
    @endpush
    @push('functions')
    <script src="/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
    <script src="/js/admin-proyectos.js"></script>
    @endpush
