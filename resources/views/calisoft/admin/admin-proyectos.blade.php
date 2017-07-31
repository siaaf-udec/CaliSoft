@extends('layouts.dash')

@section('content')
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
        
        <div class="row vcenter">

            <div class="col-sm-6">
                <div class="list-group">
                    <a v-for="proyecto in paginator.items" class="list-group-item" 
                        :class="{ 'list-group-item-info': seleccion == proyecto}" 
                        @click.prevent="seleccion = proyecto">

                        @{{proyecto.nombre}}

                        <span title="propuesta" class="badge bg-green-seagreen bg-font-green-seagreen" 
                            v-if="proyecto.state == 'propuesta'">
                            P
                        </span>
                    </a>
                </div>
                
                <center>
                    <pagination v-model="paginator.page" :total-page="paginator.lastPage" ></pagination>
                </center>
                
            </div>

            <div class="col-sm-6" v-if="seleccion.nombre">

                <proyecto-tabla :proyecto="seleccion" @updated="update" @removed="remove">
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
<link rel="stylesheet" href="/assets/global/plugins/bootstrap-toastr/toastr.min.css">
@endpush
@push('functions')
<script src="/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
<script src="/js/admin-proyectos.js"></script>
@endpush
