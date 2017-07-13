@extends('layouts.student-dash')

@section('content')

    <div class="col-md-12">
        @component('components.portlet', ['icon' => 'fa fa-book', 'title' => 'Documentos'])
            <div id="app">
                <br>


                    <!-- Table de categorias -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered table-condensed">
        <thead>
            <th>Documento</th>
            <th>Tipo</th>
            <th>Operación</th>

        </thead>
        <tbody>
            <tr v-for="documento in documentos" class="text-center">
                <td v-text="documento.url"></td>
                <td v-text="documento.FK_TipoDocumentoId"></td>
                <td class="text-center">
                     <div class="btn-group">
                    <button class="editar-categoria btn btn-warning btn-xs" @click.prevent="openEditModal(documento)">
                    <span class="glyphicon glyphicon-edit"></span>
                    </button>
                    <button class="editar-modal btn btn-danger btn-xs" @click.prevent="destroy(documento)">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                            </div>
                </td>
            </tr>
        </tbody>
    </table>
                </div>



    <button type="button"  @click.prevent="show()" class="btn blue center-block">
            <i class="fa fa-plus"></i>
            Subir Documento
    </button>

<!--Creación modal Documentación -->

    <modal id="subir-documentos" title="Subir documentación">
                <form @submit.prevent='store()'>
                    <div class="form-group">
        <label class="control-label">Tipo de documento</label>
             <select id="tidocu" name="FK_TipoDocumentoId" class="form-control select2" v-model="newDocumentos.FK_TipoDocumentoId" required>
                    <option v-for="tiposDocumento in tiposDocumentos" v-bind:value="tiposDocumento.PK_id"> @{{ tiposDocumento.nombre }}
                    </option>
            </select>
                <br>
                <span v-if="formErrorsUpdate['FK_TipoDocumentoId']" class="error text-danger">
                                                    @{{formErrorsUpdate.FK_TipoDocumentoId[0]}}
                </span>


                <div class="form-group">
                    <img v-if="preview" :src="preview" class="img-responsive img-thumbnail">
                    <input type="file" id="url" name="url" class="inputfile" @change="fileChange" accept="file_extension">
                    <label for="logo" class="btn btn-primary form-control"> PDF </label>
                </div>

                <span v-if="formErrorsUpdate['url']" class="error text-danger">
                                                    @{{formErrorsUpdate.url[0]}}
                </span>
                <br>
                <br>
                <div class="text-center">
                <button type="submit" class="btn blue"><i class="fa fa-plus"></i>Subir Documento</button>
                    <button type="button" class="btn red" data-dismiss="modal">
                            <i class="fa fa-ban"></i>
                            Cancelar
                    </button>
                    </div>
                </form>
            </modal>

<!--edicion modal -->
<modal id="editar-documentos" title="Editar documentación">
                <form @submit.prevent="update(fillDocumentos.PK_id)">
        <br>
        <br>
        <div class ="text-center">
            <div class="form-group" >
                <label class="control-label">Tipo de documento</label>
                <select id="tidocu" name="FK_TipoDocumentoId" class="form-control select2" v-model="fillDocumentos.FK_TipoDocumentoId" required>
                    <option v-for="tiposDocumento in tiposDocumentos" v-bind:value="tiposDocumento.PK_id"> @{{ tiposDocumento.nombre }}
                    </option>
                </select>
                <span v-if="formErrorsUpdate['FK_TipoDocumentoId']" class="error text-danger">
                                                    @{{formErrorsUpdate.FK_TipoDocumentoId[0]}}
                </span>
                <input type="text" name="url" v-model="fillDocumentos.url" required>
                <span v-if="formErrorsUpdate['url']" class="error text-danger">
                                                    @{{formErrorsUpdate.url[0]}}
                </span>
            <br>
            <br>
            </div>
                <br>
                <button type="submit" class="btn blue"><i class="fa fa-plus"></i>Modificar Documento</button>
                     <button type="button" class="btn red" data-dismiss="modal">
                            <i class="fa fa-ban"></i>
                            Cancelar
                        </button>
        </div>
    </form>
</modal>
</div>
@endcomponent
</div>


@endsection

@push('styles')
    <link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/global/plugins/bootstrap-toastr/toastr.min.css">
@endpush

@push('functions')
    <script src="../assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
    <script>

    window.proyectId =  {{$co->pivot->FK_ProyectoId}} ;
    </script>

    <script src="/js/documentos.js"></script>




@endpush



@push('plugins')
    <script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

@endpush
