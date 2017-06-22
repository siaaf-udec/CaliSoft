@extends('layouts.student-dash')

@section('content')
    

    <div class="form-group row add" >
        <div class="col-md-12">
                <h4 class="text-center">SUBIR DOCUMENTACION</h4>
        </div>
        <br>
        <br>
        <div class ="text-center">
            @component('components.bootstrap-select', ['items' => 'asdasd', 'title' => 'Tipo de documento'])
            @endcomponent
            <br>
            <br>
            @component('components.fileinput', ['title1' => 'Seleccionar documento', 'title2' => 'Seleccionar','icon' => 'fa fa-file fileinput-exists'])
            @endcomponent
            


        <div class="col-md-12">
            <div class="form-group">
                <br>
                <br>
                <br>
                <button type="submit" class="btn btn-success">Agregar documento</button>
            </div>
        </div>

        </div>
    </div>

    
    <div id="app">
    <div class="table-responsive">
    <table class="table table-striped table-hover table-bordered table-condensed">
        <thead>
            <th>Documento</th>
            <th>Operación</th>
            
        </thead>
        <tbody>
            <tr v-for="categoria in categorias">
                <td v-text="documento.nombre"></td>
                <td> <button class="editar-categoria btn btn-warning" @click.prevent="openEditModal(categoria)">
                    <span class="glyphicon glyphicon-edit"></span>Editar
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
    
</div>

<!--edicion modal -->
<div class="modal fade " id="editar-documento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"></span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Editar Documento</h4>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" v-on:submit.prevent="update(fillCategoria.PK_id)">
                    <div class="form-group">
                        <label for="title">Nombre Documento</label>
                        <input type="text" name="nombre" class="form-control" v-model="fillCategoria.nombre"/>
                        <span v-if="formErrorsUpdate['nombre']" class="error text-danger">
                            @{{formErrorsUpdate.nombre[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="title">Seleccionar archivo</label>
                        <input type="text" name="plataforma" class="form-control" v-model="fillCategoria.plataforma"/>
                        <span v-if="formErrorsUpdate['plataforma']" class="error text-danger">
                            @{{formErrorsUpdate.plataforma[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Editar Documento</button>
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