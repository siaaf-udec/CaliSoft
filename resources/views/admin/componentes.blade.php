@extends('layouts.admin-dash') @section('content')
<div class="col-md-12">
    @component('components.portlet', ['icon' =>
        'fa fa-cubes',
        'title' => 'Componentes de ' . $tdocumento->nombre])
    <div id="app">

            <!-- Table de categorias -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-condensed">
                    <thead>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Obligatorio</th>
                        <th class="text-center">Descripción</th>
                        <th class="text-center">Acciones</th>
                    </thead>
                    <tbody>
                        <tr v-for="componente in componentes" class="text-center">
                            <td v-text="componente.nombre"></td>
                            <td v-text="componente.required ? 'SI' : 'NO'"></td>
                            <td v-text="componente.descripcion"></td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="editar-categoria btn btn-warning btn-xs" @click.prevent="openEditModal(componente)">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                    <button class="editar-modal btn btn-danger btn-xs" @click.prevent="destroy(componente)">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <button type="button" data-toggle="modal" data-target="#crear-componente" class="btn blue center-block">
                <i class="fa fa-plus"></i>
                Crear Nuevo Componente
            </button>


            <!--Comienzo Modal de creación -->
            <modal id="crear-componente" title="Crear Componentes">
                <form @submit.prevent='store()'>
                    <div class="form-group">
                        <label for="title">Nombre del Componente</label>
                        <input type="text" name="nombre" class="form-control" v-model="newComponente.nombre" required="" />
                        <span v-if="formErrors['nombre']" class="error text-danger">
                            @{{formErrors.nombre[0]}}
                        </span>
                    </div>


                    <div class="form-group form-md-radios">
                        <label>OBLIGATORIO</label>
                        <div class="form-group">
                            <bs-switch id="required" label="requerido" v-model="newComponente.required">
                            </bs-switch>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title">Descripción</label>
                        <textarea name="descripcion" cols="20" rows="4" class="form-control" v-model="newComponente.descripcion" required="">
                        </textarea>
                        <span v-if="formErrors['descripcion']" class="error text-danger">
                            @{{formErrors.nombre[0]}}
                        </span>
                    </div>

                    <button type="submit" class="btn blue"><i class="fa fa-plus"></i>Crear Componente</button>
                    <button type="button" class="btn red" data-dismiss="modal"><i class="fa fa-ban"></i>Cancelar</button>
                </form>
            </modal>
            <!-- Fin de Modal de creación -->

            <!--Comienzo Modal de edicion -->
            <modal id="editar-componentes" title="Editar Componente">
                <form @submit.prevent="update(fillComponente.PK_id)">

                    <div class="form-group">
                        <label for="title">Nombre del Componente</label>
                        <input type="text" name="nombre" class="form-control" v-model="fillComponente.nombre" required="" />
                        <span v-if="formErrorsUpdate['nombre']" class="error text-danger">
                            @{{formErrorsUpdate.nombre[0]}}
                        </span>
                    </div>

                    <div class="form-group form-md-radios">
                        <label>OBLIGATORIO</label>
                        <div class="form-group">
                            <bs-switch id="required-update" label="requerido" v-model="fillComponente.required">
                            </bs-switch>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title">Descripción</label>
                        <textarea name="descripcion" cols="20" rows="4" class="form-control" v-model="fillComponente.descripcion" required="">
                        </textarea>
                        <span v-if="formErrorsUpdate['descripcion']" class="error text-danger">
                            @{{formErrorsUpdate.nombre[0]}}
                        </span>
                    </div>

                    <button type="submit" class="btn blue"><i class="fa fa-plus"></i>Guardar</button>
                    <button type="button" class="btn red" data-dismiss="modal"><i class="fa fa-ban"></i>Cancelar</button>

                </form>
            </modal>


            <!-- Fin de Modal de edicion -->

            @endcomponent
        </div>
    </div>
</div>


@endsection @push('styles')
<link rel="stylesheet" href="/assets/global/plugins/bootstrap-toastr/toastr.min.css"> @endpush 

@push('functions')
<script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
<script>
    window.documentId = {{ $tdocumento ->PK_id }};

</script>
<script src="/js/componentes.js"></script>
@endpush
