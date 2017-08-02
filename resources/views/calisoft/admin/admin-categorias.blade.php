@extends('layouts.dash') @section('content')
<div class="col-md-12">
    @component('components.portlet', ['icon' => 'fa fa-pie-chart', 'title' => 'Categorias'])

    <div id="app">

        <!-- Table de categorias -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%">
                <thead>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Plataforma</th>
                    <th class="text-center">Modelado</th>
                    <th class="text-center">Base de datos</th>
                    <th class="text-center">Codificación</th>

                    <th class="text-center">Operaciones</th>
                </thead>
                <tbody>
                    <tr v-for="categoria in categorias" class="text-center">
                        <td v-text="categoria.nombre"></td>
                        <td v-text="categoria.plataforma"></td>
                        <td v-text="categoria.modelado"></td>
                        <td v-text="categoria.base_datos"></td>
                        <td v-text="categoria.codificacion"></td>


                        <td class="text-center">
                            <popover title="Descripción" placement="bottom">
                                <button type="button" class="btn btn-default btn-xs" data-role="trigger" title="Descripción">
                            <span class="fa fa-map-o"></span>
                            </button>
                                <div slot="popover">
                                    @{{categoria.descripcion}}
                                </div>
                            </popover>

                            <button class="editar-categoria btn blue btn-xs" title="Editar Categoria" @click.prevent="openEditModal(categoria)">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>


                            <button class="editar-modal btn red btn-xs" title="Eliminar Categoria" @click.prevent="openDeleteModal(categoria)">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>

                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-condensed">

                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- Tabla de Categorias -->
            <button type="button" data-toggle="modal" data-target="#crear-categoria" class="btn green-jungle center-block">
                    <i class="fa fa-plus"></i>
                    Crear Nueva Categoría
                </button>
        </div>

        <!--Modal de creacion de categoria -->
        <modal id="crear-categoria" title="Crear Categoria">
            <form @submit.prevent="store()">



                <text-input name="nombre" :error="formErrors.nombre" v-model="newCategoria.nombre" label="Nombre de la Categoría" icon="fa fa-pie-chart" required></text-input>


                <!-- Fila De Porcentajes -->
                <div class="row">

                    <div class="form-group col-sm-6 form-md-line-input" :class="{'has-error':formErrors.plataforma}">
                        <div class="input-icon">
                            <input type="number" name="plataforma" id="plataforma" class="form-control" v-model="newCategoria.plataforma" min="0" max="100" required/>
                            <label for="plataforma" class="control-label">Evaluación de plataforma</label>

                            <span v-if="formErrors['plataforma']" class=" help-block">
                               <strong> @{{formErrors.plataforma[0]}}</strong>
                        </span>
                            <i class="fa fa-percent"></i>
                        </div>
                    </div>


                    <div class="form-group col-sm-6 form-md-line-input" :class="{'has-error':formErrors.modelado}">
                        <div class="input-icon">
                            <input type="number" name="modelado" class="form-control" v-model="newCategoria.modelado" min="0" max="100" required/>
                            <label for="modelado">Evaluación del modelado</label>

                            <span v-if="formErrors.modelado" class="help-block">
                                   <strong> @{{formErrors.modelado}}</strong>
                            </span>
                            <i class="fa fa-percent"></i>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-sm-6 form-md-line-input" :class="{'has-error':formErrors.base_datos}">
                        <div class="input-icon">
                            <input type="number" name="base_datos" class="form-control" v-model="newCategoria.base_datos" min="0" max="100" required/>
                            <label for="base_datos">Evaluación de Base de datos</label>

                            <span v-if="formErrors['base_datos']" class="help-block">
                                    @{{formErrors.base_datos[0]}}
                            </span>
                            <i class="fa fa-percent"></i>
                        </div>
                    </div>

                    <div class="form-group col-sm-6 form-md-line-input" :class="{'has-error':formErrors.codificacion}">
                        <div class="input-icon">
                            <input type="number" name="codificacion" class="form-control" v-model="newCategoria.codificacion" min="0" max="100" required/>
                            <label for="codificacion">Evaluación Codificación</label>

                            <span v-if="formErrors['codificacion']" class="help-block">
                                @{{formErrors.codificacion[0]}}
                            </span>
                            <i class="fa fa-percent"></i>
                        </div>
                    </div>

                </div>





                <div class="form-group col-sm-12 form-md-line-input" :class="{'has-error':formErrors.descripcion}">

                    <textarea name="descripcion" class="form-control" v-model="newCategoria.descripcion" maxlength="200" required style="resize: none" rows="3" />
                    </textarea>
                    <label for="descripcion">Descripción</label>


                    <span v-if="formErrors['descripcion']" class="help-block">
                                @{{formErrors.descripcion[0]}}
                            </span>

                </div>

                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn green-jungle"><i class="fa fa-plus"></i>Crear Categoría</button>
                        <button type="button" class="btn red" data-dismiss="modal">
                            <i class="fa fa-ban"></i>
                            Cancelar
                        </button>
                    </div>
                </div>
            </form>
        </modal>
        <!-- Fin Modal de creacion de categoria -->

        <!--Comienzo Modal de edicion -->
        <modal id="editar-categoria" title="Editar Categoria">
            <form @submit.prevent="update(fillCategoria.PK_id)">

                <div class="form-group form-md-line-input" :class="{'has-error':formErrorsUpdate.nombre}">
                    <div class="input-icon">
                        <input type="text" name="nombre" class="form-control" v-model="fillCategoria.nombre" required/>
                        <label for="title">Nombre de la Categoría </label>

                        <span v-if="formErrorsUpdate['nombre']" class="help-block">
                            @{{formErrorsUpdate.nombre[0]}}
                        </span>
                        <i class="fa fa-pie-chart"></i>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="title">Evaluación de la plataforma</label>
                        <input type="number" name="plataforma" class="form-control" v-model="fillCategoria.plataforma" min="0" max="100" required/>
                        <span v-if="formErrorsUpdate['plataforma']" class="error text-danger">
                                @{{formErrorsUpdate.plataforma[0]}}
                            </span>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="title">Evaluación del modelado</label>
                        <input type="number" name="modelado" class="form-control" v-model="fillCategoria.modelado" min="0" max="100" required/>
                        <span v-if="formErrorsUpdate['modelado']" class="error text-danger">
                                @{{formErrorsUpdate.modelado[0]}}
                            </span>
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-sm-6">
                        <label for="title">Evaluación de Base de datos</label>
                        <input type="number" name="base_datos" class="form-control" v-model="fillCategoria.base_datos" min="0" max="100" required/>
                        <span v-if="formErrorsUpdate['base_datos']" class="error text-danger">
                                @{{formErrorsUpdate.base_datos[0]}}
                            </span>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="title">Evaluación Codificación</label>
                        <input type="number" name="codificacion" class="form-control" v-model="fillCategoria.codificacion" min="0" max="100" required/>
                        <span v-if="formErrorsUpdate['codificacion']" class="error text-danger">
                                @{{formErrorsUpdate.codificacion[0]}}
                            </span>
                    </div>

                </div>



                <div class="row">

                    <div class="form-group col-sm-12">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" class="form-control" v-model="fillCategoria.descripcion" maxlength="200" required style="resize: none" rows="3" />
                        </textarea>
                        <span v-if="formErrors['descripcion']" class="error text-danger">
                                @{{formErrors.descripcion[0]}}
                            </span>
                    </div>



                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn green-jungle">
                            <i class="fa fa-edit"></i>Editar Categoría
                        </button>
                        <button type="button" class="btn red" data-dismiss="modal">
                            <i class="fa fa-ban"></i>Cancelar
                        </button>
                    </div>
                </div>

            </form>
        </modal>
        <!-- Fin de Modal de edicion -->

        <!-- inicio modal eliminar-->
        <modal id="eliminar-categoria" title="Eliminar Categoria">
            ¿Desea eliminar la categoría @{{elimiCategoria.nombre}}?

            <div class="modal-footer" slot="footer">
                <button class="btn green-jungle" @click="destroy(elimiCategoria)">
                    <i class="fa fa-edit"></i>Eliminar Categoria
                </button>
                <button type="button" class="btn red" data-dismiss="modal">
                    <i class="fa fa-ban"></i>Cancelar
                </button>
            </div>
        </modal>
        <!-- Fin Modal Eliminar -->

        @include('partials.modal-help-categoria')

    </div>

</div>

@endcomponent

</div>

@endsection @push('styles')
<link rel="stylesheet" href="/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css">
<link href="/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" /> @endpush @push('functions')
<script src="/js/categorias.js"></script>
<script src="/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
@endpush