@extends('layouts.admin-dash')


@section('content')
    <div id="app">
    
       <h2> {{ $documento->nombre }}</h2>
    

        <form @submit.prevent='store()'>
            <div class="form-group">
                <label for="title">Nombre del Componente</label>
                <input type="text" name="nombre" class="form-control" v-model="newComponente.nombre" required="" />                    
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
                        <form>

                            <div class="form-group">
                                <label for="title">Nombre del componente: </label>
                                <input type="text" name="nombre" class="form-control" required/>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title">Obligatorio: </label>
                                    <input type="text" name="required" class="form-control" required/>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="title">Descripción: </label>
                                    <input type="text" name="descripcion" class="form-control" required/>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="title">Documento: </label>
                                    <input type="number" name="documento" class="form-control" required/>
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
</div>

    
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
