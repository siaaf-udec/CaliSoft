@extends('layouts.student-dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', ['icon' => 'fa fa-pencil-square', 'title' => 'Registro Proyecto'])
            <div id="app">
              <form v-on:submit.prevent="store()">
                    <div class="row">
                        <div class="form-group form-md-line-input col-md-6" :class="{'has-error': errors.nombre }">
                            <div class="input-icon">
                                <i class="fa fa-cubes"></i>
                                <input class="form-control" id="nomProyecto" placeholder="Nombre del proyecto" v-model="proyecto.nombre" required=""></input>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group form-md-line-input col-sm-4 col-xs-12">
                            <bs-select id="categoria" v-model="proyecto.FK_categoria" title="Categoria" required>
                                <option v-for="categoria in categorias" :value="categoria.PK_id" :key="categoria.PK_id">
                                    @{{ categoria.nombre }}
                                </option>
                            </bs-select>
                        </div>
                        <div class="form-group form-md-line-input col-sm-4 col-xs-12" >
                            <bs-select id="semilleros" v-model="proyecto.FK_semillero" title="Semilleros" required>
                                 <option v-for="semillero in semilleros" :value="semillero.PK_id">
                                     @{{ semillero.nombre }}
                                 </option>
                            </bs-select>
                        </div>
                        <div class="form-group form-md-line-input col-sm-4 col-xs-12">
                            <bs-select id="grupos" v-model="proyecto.FK_grupo" title="Grupo de investigacion" required>
                                <option v-for=" grupo in grupos" :value="grupo.PK_id">@{{ grupo.nombre }}</option>
                            </bs-select>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn blue center-block">Enviar</button>
                    </div>

              </form>
            </div>
        @endcomponent
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css">
@endpush

@push('functions')
    <script src="/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="/js/proyectos.js"></script>
@endpush
