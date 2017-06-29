@extends('layouts.student-dash')

@section('content')
    
    <div id="app">
    <div class="form-group row add" >


    <form @submit.prevent='store({{ $idFK->FK_ProyectoId }})'>
        <div class="col-md-12">
                <h4 class="text-center">SUBIR DOCUMENTACION {{ $idFK->name}}</h4>
        </div>


        <br>
        <br>
        <div class ="text-center">
            <div class="form-group" >
                <label class="control-label">Tipo de documentos</label>
                <select id="tidocu" name="FK_TipoDocumentoId" class="form-control select2" v-model="newDocumentos.FK_TipoDocumentoId" required>
                    <option v-for="tiposDocumento in tiposDocumentos" v-bind:value="tiposDocumento.PK_id"> @{{ tiposDocumento.nombre }}
                    </option>
                </select>
                <span v-if="formErrorsUpdate['FK_TipoDocumentoId']" class="error text-danger">
                                                    @{{formErrorsUpdate.FK_TipoDocumentoId[0]}}
                </span>
            

                <input type="text" name="url" v-model="newDocumentos.url" required>
                <span v-if="formErrorsUpdate['url']" class="error text-danger">
                                                    @{{formErrorsUpdate.url[0]}}
                </span>
            
            <br>
            <br>

            <div v-if="!image">
    <h2>Select an image</h2>
    <input type="file" @change="onFileChange">
  </div>
  <div v-else>
    <img :src="image" />
    <button @click="removeImage">Remove image</button>
  </div>
                

            
               <!-- <label class="control-label col-md-3">Seleccionar documento</label>
                    <div class="col-md-3">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="input-group input-large">
                                <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                    <span class="fileinput-filename"> </span>
                                </div>
                            <span class="input-group-addon btn default btn-file">
                                <span class="fileinput-new"> Seleccionar </span>
                                <span class="fileinput-exists"> Cambiar </span>
                                <input type="number" name="url" v-model="newDocumentos.FK_TipoDocumentoId" required > 
                            </span>
                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remover </a>
                            </div>
                        </div>
                    </div>-->
            </div>
            


        <div class="col-md-12">
            <div class="form-group">
                <br>
                <br>
                <br>
                <button type="submit" class="btn btn-success">Agregar documento</button>
            </div>
        </div>

        </div>
    </form>
    </div>

    
    <div class="table-responsive">
    <table class="table table-striped table-hover table-bordered table-condensed">
        <thead>
            <th>Documento</th>
            <th>Operación</th>
            
        </thead>
        <tbody>
            <!--<tr v-for="documento in documentos">
                <td v-text="documento.nombre"></td>
                <td> <button class="editar-documentos btn btn-warning" @click.prevent="openEditModal(documento)">
                    <span class="glyphicon glyphicon-edit"></span>Editar
                    </button>
                </td>
            </tr>-->
        </tbody>
    </table>
    </div>
    


<!--edicion modal -->
<div class="modal fade " id="editar-documentos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"></span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Editar Documento</h4>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" v-on:submit.prevent="update(fillDocumentos.PK_id)">
                    <div class="form-group">
                        <label for="title">Nombre Documento</label>
                        <input type="text" name="nombre" class="form-control" v-model="fillDocumentos.nombre"/>
                        <span v-if="formErrorsUpdate['nombre']" class="error text-danger">
                            @{{formErrorsUpdate.nombre[0]}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="title">Seleccionar archivo</label>
                        <input type="text" name="plataforma" class="form-control" v-model="fillDocumentos.plataforma"/>
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

@push('styles')
    <link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/global/plugins/bootstrap-toastr/toastr.min.css">
@endpush

@push('functions')
    <script src="../assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>

    <script src="/js/documentos.js"></script>
@endpush



@push('plugins')
    <script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

@endpush