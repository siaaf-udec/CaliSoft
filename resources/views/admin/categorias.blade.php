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
            <th>secuencia</th>
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
                <td v-text="categoria.sequencia"></td>
                <td v-text="categoria.uso"></td>
                <td>
                <button class="editar-categoria btn btn-warning" @click.prevent="openEditModal(categoria)">
                <span class="glyphicon glyphicon-edit"></span>Editar
                </button>
                </td>
                <td>
                <button class="editar-modal btn btn-danger" @click.prevent="destroy(categoria)">
                <span class="glyphicon glyphicon-trash"></span>Eliminar
                </button>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
    

<!--creacion de el modal -->
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
                <form method="post" enctype="multipart/form-data" v-on:submit.prevent="store()">
                    <div class="form-group">
                        <label for="title">Nombre </label>
                        <input type="text" name="nombre" class="form-control" v-model="newCategoria.nombre"/>
                        <span v-if="formErrors['nombre']" class="error text-danger">
                            @{{formErrors.nombre[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="title">Plataforma</label>
                        <input type="text" name="plataforma" class="form-control" v-model="newCategoria.plataforma"/>
                        <span v-if="formErrors['plataforma']" class="error text-danger">
                            @{{formErrors.plataforma[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="title">Modelado</label>
                        <input type="text" name="modelado" class="form-control" v-model="newCategoria.modelado"/>
                        <span v-if="formErrors['modelado']" class="error text-danger">
                            @{{formErrors.modelado[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="title">Despliegue</label>
                        <input type="text" name="despliegue" class="form-control" v-model="newCategoria.despliegue"/>
                        <span v-if="formErrors['despliegue']" class="error text-danger">
                            @{{formErrors.despliegue[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="title">Entidad/relación</label>
                        <input type="text" name="entidad_relacion" class="form-control" v-model="newCategoria.entidad_relacion"/>
                        <span v-if="formErrors['entidad_relacion']" class="error text-danger">
                            @{{formErrors.entidad_relacion[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="title">Clases</label>
                        <input type="text" name="clases" class="form-control" v-model="newCategoria.clases"/>
                        <span v-if="formErrors['clases']" class="error text-danger">
                            @{{formErrors.clases[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="title">Actividades</label>
                        <input type="text" name="actividades" class="form-control" v-model="newCategoria.actividades"/>
                        <span v-if="formErrors['actividades']" class="error text-danger">
                            @{{formErrors.actividades[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="title">Secuencia</label>
                        <input type="text" name="sequencia" class="form-control" v-model="newCategoria.sequencia"/>
                        <span v-if="formErrors['sequencia']" class="error text-danger">
                            @{{formErrors.sequencia[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="title">Uso</label>
                        <input type="text" name="uso" class="form-control" v-model="newCategoria.uso"/>
                        <span v-if="formErrors['uso']" class="error text-danger">
                            @{{formErrors.uso[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Crear Categoría</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>
</div>

<!--edicion modal -->
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
                <form method="post" enctype="multipart/form-data" v-on:submit.prevent="update(fillCategoria.PK_id)">
                    <div class="form-group">
                        <label for="title">Nombre </label>
                        <input type="text" name="nombre" class="form-control" v-model="fillCategoria.nombre"/>
                        <span v-if="formErrorsUpdate['nombre']" class="error text-danger">
                            @{{formErrorsUpdate.nombre[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="title">Plataforma</label>
                        <input type="text" name="plataforma" class="form-control" v-model="fillCategoria.plataforma"/>
                        <span v-if="formErrorsUpdate['plataforma']" class="error text-danger">
                            @{{formErrorsUpdate.plataforma[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="title">Modelado</label>
                        <input type="text" name="modelado" class="form-control" v-model="fillCategoria.modelado"/>
                        <span v-if="formErrorsUpdate['modelado']" class="error text-danger">
                            @{{formErrorsUpdate.modelado[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="title">Despliegue</label>
                        <input type="text" name="despliegue" class="form-control" v-model="fillCategoria.despliegue"/>
                        <span v-if="formErrorsUpdate['despliegue']" class="error text-danger">
                            @{{formErrorsUpdate.despliegue[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="title">Entidad/relación</label>
                        <input type="text" name="entidad_relacion" class="form-control" v-model="fillCategoria.entidad_relacion"/>
                        <span v-if="formErrorsUpdate['entidad_relacion']" class="error text-danger">
                            @{{formErrorsUpdate.entidad_relacion[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="title">Clases</label>
                        <input type="text" name="clases" class="form-control" v-model="fillCategoria.clases"/>
                        <span v-if="formErrorsUpdate['clases']" class="error text-danger">
                            @{{formErrorsUpdate.clases[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="title">Actividades</label>
                        <input type="text" name="actividades" class="form-control" v-model="fillCategoria.actividades"/>
                        <span v-if="formErrorsUpdate['actividades']" class="error text-danger">
                            @{{formErrorsUpdate.actividades[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="title">Secuencia</label>
                        <input type="text" name="sequencia" class="form-control" v-model="fillCategoria.sequencia"/>
                        <span v-if="formErrors['sequencia']" class="error text-danger">
                            @{{formErrorsUpdate.sequencia[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="title">Uso</label>
                        <input type="text" name="uso" class="form-control" v-model="fillCategoria.uso"/>
                        <span v-if="formErrorsUpdate['uso']" class="error text-danger">
                            @{{formErrorsUpdate.uso[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Editar Categoría</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>
</div>
</div>


@endsection
@push('functions')
    <script src="/js/categorias.js"></script>
@endpush