@extends('layouts.admin-dash')


@section('content')
    <div class="col-md-12">
        @component('components.portlet', ['icon' => 'fa fa-cubes', 'title' => 'Componentes'])
            <div id="app">
               <h2> {{ $documento->nombre }}</h2>

                <form @submit.prevent='store()'>
                    <div class="form-group">
                        <label for="title">Nombre del Componente</label>
                        <input type="text" name="nombre" class="form-control" v-model="newComponente.nombre" required="" />
                    </div>


                    <div class="form-group form-md-radios">
                        <label>OBLIGATORIO</label>
                        <div class="md-radio-list">
                            <div class="md-radio">
                                <input type="radio" value="1" id="radio1" name="required" class="md-radiobtn" v-model="newComponente.required" checked>
                                    <label for="radio1">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> SÍ
                                    </label>
                            </div>
                            <div class="md-radio">
                                <input type="radio" value="0" id="radio2" name="required" v-model="newComponente.required" class="md-radiobtn">
                                    <label for="radio2">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> NO
                                    </label>
                            </div>
                        </div>
                    </div>

                    <!--
                    <div class="form-group">
                        <label for="title">Obligatorio</label>
                        <input type="num" name="required" class="form-control" v-model="newComponente.required"/>

                    </div> -->
                    <div class="form-group">
                        <label for="title">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" v-model="newComponente.descripcion" required="" />

                    </div>

                     <button type="submit" class="btn btn-success">Crear</button>

                </form>

                <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h4>LISTA DE COMPONENTES CORRESPONDIENTES A <font style="text-transform: uppercase;">{{ $documento->nombre }}</font></h4>
                </div>
                <div class="panel-body">
                    <!-- Table de categorias -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-condensed">
                            <thead>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Obligatorio</th>
                                <th class="text-center">Descripción</th>
                                <th class="text-center">Documento</th>
                                <th class="text-center">Acciones</th>
                            </thead>
                            <tbody>
                                <tr v-for="componentes in componentes" class="text-center">
                                    <td v-text="componentes.nombre"></td>
                                    <td v-text="componentes.required" ></td>
                                    <td v-text="componentes.descripcion" ></td>
                                    <td> {{ $documento->nombre }} </td>

                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button class="editar-categoria btn btn-warning btn-xs" @click.prevent="openEditModal(componentes)">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </button>
                                            <button class="editar-modal btn btn-danger btn-xs" @click.prevent="destroy(componentes)">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>

            <!--Comienzo Modal de edicion -->
            <div class="modal fade " id="editar-componentes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                        </button>
                            <h4 class="modal-title" id="myModalLabel">Editar Componente </h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group form-group-sm">
                                <form @submit.prevent="update(fillComponente.PK_id)">

                                    <div class="form-group">
                                        <label for="title">Nombre del componente: </label>
                                        <input type="text" name="nombre" class="form-control" v-model="fillComponente.nombre" required/>
                                        <span v-if="formErrorsUpdate['nombre']" class="error text-danger">
                                        @{{formErrorsUpdate.nombre[0]}}
                                    </span>
                                    </div>


                                    <div class="form-group form-md-radios">
                                        <label>OBLIGATORIO</label>
                                        <div class="md-radio-list">
                                            <div class="md-radios">
                                                <input type="radio" value="1" id="radio3" name="required" class="md-radiobtn"  v-model="fillComponente.required" checked>
                                                <label for="radio1">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> SÍ
                                                </label>
                                            </div>
                                            <div class="md-radios">
                                                <input type="radio" value="0" id="radio4" name="required"  v-model="fillComponente.required" class="md-radiobtn">
                                                <label for="radio2">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span> NO
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">

                                       <!-- <div class="form-group">
                                            <label for="title">Obligatorio: </label>
                                            <input type="text" name="required" class="form-control" v-model="fillComponente.required" required/>
                                            <span v-if="formErrorsUpdate['required']" class="error text-danger">
                                        @{{formErrorsUpdate.required[0]}}
                                    </span>

                                        </div> -->

                                        <div class="form-group">
                                            <label for="title">Descripción: </label>
                                            <input type="text" name="descripcion" class="form-control" v-model="fillComponente.descripcion" required/>
                                            <span v-if="formErrorsUpdate['descripcion']" class="error text-danger">
                                                 @{{formErrorsUpdate.descripcion[0]}}
                                            </span>

                                        </div>

                                        <div class="form-group" >
                                        <label for="single" class="control-label">Documentos</label>

                                                <select id="tidocu" name="FK_TipoDocumentoId" class="form-control select2" v-model="fillComponente.FK_TipoDocumentoId" required>
                                                        <option v-for="tiposDocumento in tiposDocumentos" v-bind:value="tiposDocumento.PK_id"> @{{ tiposDocumento.nombre }}
                                                        </option>
                                                </select>
                                                <span v-if="formErrorsUpdate['FK_TipoDocumentoId']" class="error text-danger">
                                                    @{{formErrorsUpdate.FK_TipoDocumentoId[0]}}
                                                </span>
                                        </div>

                                    </div>

                                    <div class="modal-footer">

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Editar Componente</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin de Modal de edicion -->

        @endcomponent
    </div>


@endsection

@push('styles')
  <link rel="stylesheet" href="/assets/global/plugins/bootstrap-toastr/toastr.min.css">
@endpush

@push('functions')
    <script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
    <script>
        window.documentId = {{ $documento->PK_id }};
    </script>
    <script src="/js/componentes.js"></script>
@endpush
