@extends('layouts.admin-dash') 
@section('content')



<div id="app" class="col-md-10 col-md-offset-1">
    <div class="panel panel-primary">
        <div class="panel-heading text-center">
            <h4>CONFIGURACIÓN DE PORCENTAJES</h4>
        </div>
        <div class="panel-body">
            <!-- Table de categorias -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-condensed">
                    <thead>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Plataforma</th>
                        <th class="text-center">Modelado</th>                  
                        <th class="text-center">Operaciones</th>
                    </thead>
                    <tbody>
                        <tr v-for="categoria in categorias" class="text-center">
                            <td v-text="categoria.nombre"></td>
                            <td v-text="categoria.plataforma" ></td>
                            <td v-text="categoria.modelado" ></td>
                           
                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="editar-categoria btn btn-warning btn-xs" @click.prevent="openEditModal(categoria)">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                    <button class="editar-modal btn btn-danger btn-xs" @click.prevent="destroy(categoria)">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="table-responsive">
                <table class="table table-hover table-bordered table-condensed">
                    <thead>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Despliegue</th>
                        <th class="text-center">Entidad/relación</th>
                        <th class="text-center">Clases</th>
                        <th class="text-center">Actividades</th>
                        <th class="text-center">secuencia</th>
                        <th class="text-center">Uso</th>
                        <th class="text-center">Operaciones</th>
                    </thead>
                    <tbody>
                        <tr v-for="categoria in categorias" class="text-center">
                            <td v-text="categoria.nombre"></td>
                            <td v-text="categoria.despliegue" ></td>
                            <td v-text="categoria.entidad_relacion" ></td>
                            <td v-text="categoria.clases" ></td>
                            <td v-text="categoria.actividades" ></td>
                            <td v-text="categoria.sequencia" ></td>
                            <td v-text="categoria.uso" ></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="editar-categoria btn btn-warning btn-xs" @click.prevent="openEditModal(categoria)">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                    <button class="editar-modal btn btn-danger btn-xs" @click.prevent="destroy(categoria)">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Tabla de Categorias -->
            <button type="button" data-toggle="modal" data-target="#crear-categoria" class="btn btn-primary center-block">
                Crear Nueva Categoría
            </button>
        </div>
    </div>



    <!--Modal de creacion de categoria -->
    <div class="modal fade " id="crear-categoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"></span>
                </button>
                    <h4 class="modal-title" id="myModalLabel">Crear Nueva Categoría</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-sm">
                        <form @submit.prevent="store()">

                            <div class="form-group">
                                <label for="title">Nombre de la Categoría </label>
                                <input type="text" name="nombre" class="form-control" v-model="newCategoria.nombre" required/>
                                <span v-if="formErrors['nombre']" class="error text-danger">
                                @{{formErrors.nombre[0]}}
                            </span>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title">Porcentaje de evaluación de la plataforma</label>
                                    <input type="number"  name="plataforma" class="form-control" v-model="newCategoria.plataforma" min="0" max="100" required/>
                                    <span v-if="formErrors['plataforma']" class="error text-danger">
                                @{{formErrors.plataforma[0]}}
                            </span>
                                </div>
                                <div class="form-group">
                                    <label for="title">Diagrama de clases</label>
                                    <input type="number" name="clases" class="form-control" v-model="newCategoria.clases" min="0" max="100" required/>
                                    <span v-if="formErrors['clases']" class="error text-danger">
                            @{{formErrors.clases[0]}}
                        </span>
                                </div>
                                <div class="form-group">
                                    <label for="title">Diagrama de despliegue</label>
                                    <input type="number" name="despliegue" class="form-control" v-model="newCategoria.despliegue" min="0" max="100" required/>
                                    <span v-if="formErrors['despliegue']" class="error text-danger">
                                @{{formErrors.despliegue[0]}}
                            </span>
                                </div>
                                <div class="form-group">
                                    <label for="title">Modelo Entidad Relación</label>
                                    <input type="number" name="entidad_relacion" class="form-control" v-model="newCategoria.entidad_relacion" min="0" max="100" required/>
                                    <span v-if="formErrors['entidad_relacion']" class="error text-danger">
                            @{{formErrors.entidad_relacion[0]}}
                        </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title">Porcentaje de evaluación del modelado</label>
                                    <input type="number"  name="modelado" class="form-control" v-model="newCategoria.modelado" min="0" max="100" required/>
                                    <span v-if="formErrors['modelado']" class="error text-danger">
                                @{{formErrors.modelado[0]}}
                            </span>
                                </div>

                                <div class="form-group">
                                    <label for="title">Diagrama de actividades</label>
                                    <input type="number" name="actividades" class="form-control" v-model="newCategoria.actividades" min="0" max="100" required/>
                                    <span v-if="formErrors['actividades']" class="error text-danger">
                                @{{formErrors.actividades[0]}}
                            </span>
                                </div>
                                <div class="form-group">
                                    <label for="title">Diagrama de secuencias</label>
                                    <input type="number" name="sequencia" class="form-control" v-model="newCategoria.sequencia" min="0" max="100" required/>
                                    <span v-if="formErrors['sequencia']" class="error text-danger">
                                @{{formErrors.sequencia[0]}}
                            </span>
                                </div>
                                <div class="form-group">
                                    <label for="title">Diagrama de casos de uso.</label>
                                    <input type="number" name="uso" class="form-control" v-model="newCategoria.uso" min="0" max="100" required/>
                                    <span v-if="formErrors['uso']" class="error text-danger">
                                @{{formErrors.uso[0]}}
                            </span>
                                </div>
                            </div>
                            <div class="modal-footer">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Crear Categoría</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modal de creacion de categoria -->

    <!--Comienzo Modal de edicion -->
    <div class="modal fade " id="editar-categoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"></span>
                </button>
                    <h4 class="modal-title" id="myModalLabel">Editar Categoría</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-sm">
                        <form @submit.prevent="update(fillCategoria.PK_id)">

                            <div class="form-group">
                                <label for="title">Nombre de la Categoría </label>
                                <input type="text" name="nombre" class="form-control" v-model="fillCategoria.nombre" required/>
                                <span v-if="formErrorsUpdate['nombre']" class="error text-danger">
                                @{{formErrorsUpdate.nombre[0]}}
                            </span>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title">Porcentaje de evaluación de la plataforma</label>
                                    <input type="number" name="plataforma" class="form-control" v-model="fillCategoria.plataforma" min="0" max="100" required/>
                                    <span v-if="formErrorsUpdate['plataforma']" class="error text-danger">
                                @{{formErrorsUpdate.plataforma[0]}}
                            </span>
                                </div>
                                <div class="form-group">
                                    <label for="title">Diagrama de clases</label>
                                    <input type="number" name="clases" class="form-control" v-model="fillCategoria.clases" min="0" max="100" required/>
                                    <span v-if="formErrorsUpdate['clases']" class="error text-danger">
                            @{{formErrorsUpdate.clases[0]}}
                        </span>
                                </div>
                                <div class="form-group">
                                    <label for="title">Diagrama de despliegue</label>
                                    <input type="number" name="despliegue" class="form-control" v-model="fillCategoria.despliegue" min="0" max="100" required/>
                                    <span v-if="formErrorsUpdate['despliegue']" class="error text-danger">
                                @{{formErrorsUpdate.despliegue[0]}}
                            </span>
                                </div>
                                <div class="form-group">
                                    <label for="title">Modelo Entidad Relación</label>
                                    <input type="number" name="entidad_relacion" class="form-control" v-model="fillCategoria.entidad_relacion" min="0" max="100" required/>
                                    <span v-if="formErrorsUpdate['entidad_relacion']" class="error text-danger">
                            @{{formErrorsUpdate.entidad_relacion[0]}}
                        </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title">Porcentaje de evaluación del modelado</label>
                                    <input type="number" name="modelado" class="form-control" v-model="fillCategoria.modelado" min="0" max="100" required/>
                                    <span v-if="formErrorsUpdate['modelado']" class="error text-danger">
                                @{{formErrorsUpdate.modelado[0]}}
                            </span>
                                </div>

                                <div class="form-group">
                                    <label for="title">Diagrama de actividades</label>
                                    <input type="number" name="actividades" class="form-control" v-model="fillCategoria.actividades" min="0" max="100" required/>
                                    <span v-if="formErrorsUpdate['actividades']" class="error text-danger">
                                @{{formErrorsUpdate.actividades[0]}}
                            </span>
                                </div>
                                <div class="form-group">
                                    <label for="title">Diagrama de secuencias</label>
                                    <input type="number" name="sequencia" class="form-control" v-model="fillCategoria.sequencia" min="0" max="100" required/>
                                    <span v-if="formErrorsUpdate['sequencia']" class="error text-danger">
                                @{{formErrorsUpdate.sequencia[0]}}
                            </span>
                                </div>
                                <div class="form-group">
                                    <label for="title">Diagrama de casos de uso.</label>
                                    <input type="number" name="uso" class="form-control" v-model="fillCategoria.uso" min="0" max="100" required/>
                                    <span v-if="formErrorsUpdate['uso']" class="error text-danger">
                                @{{formErrorsUpdate.uso[0]}}
                            </span>
                                </div>
                            </div>
                            <div class="modal-footer">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Editar Categoría</button>
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
</div>


@endsection 
@push('styles')
  <link rel="stylesheet" href="/assets/global/plugins/bootstrap-toastr/toastr.min.css">
@endpush
@push('functions')
<script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
<script src="/js/categorias.js"></script>
@endpush