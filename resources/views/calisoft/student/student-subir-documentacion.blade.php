@extends('layouts.dash')

@section('content')

    <div class="col-md-12">
        @component('components.portlet', ['icon' => 'fa fa-book', 'title' => 'Documentos'])
            <div id="app">
            <div class="row">

                <div class="form-group col-md-4 col-xs-12">
                <bs-select id="role-filter" title="Tipo" v-model="tipo">
                        <option value="">Todos</option>
                        <option v-for="tiposDocumento in tiposDocumentos" v-bind:value="tiposDocumento.PK_id"> @{{ tiposDocumento.nombre }}
                    </option>
                    </bs-select>
                <br>
            </div>
            </div>

                    <!-- Table de categorias -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered table-condensed">
        <thead>
            <th></th>
            <th>Documento</th>
            <th>Tipo</th>
            <th>Operación</th>

        </thead>
        <tbody>
            <tr v-for="documento in documentos" class="text-center">
                <td class="glyphicon glyphicon-file"></td>
                <td v-text="documento.url"></td>
                <td v-text="documento.tipo_documento.nombre"></td>
                <td class="text-center">
                    

                    <button class="editar-categoria btn btn-warning btn-xs" @click.prevent="openEditModal(documento)">
                    <span class="glyphicon glyphicon-edit"></span>
                    </button>

                    <a :href="'/api/downloadFile/' +documento.url">
                    <button class="editar-categoria btn btn-info btn-xs" >
                    <span class="glyphicon glyphicon-download-alt"></span>
                    </button>
                    </a>

                    <a :href="'/api/seeFile/' +documento.url" target="_blank">
                    <button class="editar-categoria btn btn-success btn-xs" >
                    <span class="glyphicon glyphicon-eye-open"></span>
                    </button>
                    </a>

                    <button class="editar-modal btn btn-danger btn-xs" @click.prevent="destroy(documento)">
                    <span class="glyphicon glyphicon-trash"></span>
                    </button>
                    

                </td>
            </tr>
        </tbody>
    </table>
                </div>

    <!-- Paginacion -->
            <div class="row">
                <!-- Boton de crear usuario -->
                <div class="col-sm-6">
                    <button type="button"  @click.prevent="show()" class="btn blue center-block">
                    <i class="fa fa-plus"></i>
                    Subir Documento
                </button>
                </div>


                <!-- Pagination Buttons-->
                <div class="col-sm-6" v-show="paginacion.last_page > 1">
                    <ul class="pagination pager pull-right">
                        <li>
                            <a :class="{disabled: !paginacion.prev_page_url}" @click="refresh(paginacion.prev_page_url)">
                        <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                    </a>
                        </li>
                        <li v-for="index in paginacion.last_page">
                            <a @click="refresh('/api/documentacion', { page: index })">@{{index}}</a>
                        </li>
                        <li>
                            <a :class="{disabled: !paginacion.next_page_url}" @click="refresh(paginacion.next_page_url)">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </a>
                        </li>
                    </ul>
                </div>
                <!-- End Pagination Buttons-->

            </div>

<!--Creación modal Documentación -->

    <modal id="subir-documentos" title="Subir documentación">

                {{Form::open(array(
                'url'=>'api/file/',
                'files'=>true,
                'class'=>'dropzone',
                'id'=>'my-awesome-dropzones',
                'method'=>'post',
                ))}}
                <label class="control-label">Tipo de documento</label>

                <div class="row">
                    <div class="form-group col-md-8 col-xs-12">
                        <bs-select id="tidocu" name="FK_TipoDocumentoId" class="form-control select2" v-model="newDocumentos.FK_TipoDocumentoId" required>
                            <option v-for="tiposDocumento in tiposDocumentos" v-bind:value="tiposDocumento.PK_id"> @{{ tiposDocumento.nombre }}
                            </option>
                        </bs-select>
                        <br>
                    </div>
                </div>
                <span v-if="formErrorsUpdate['FK_TipoDocumentoId']" class="error text-danger">
                    @{{formErrorsUpdate.url[0]}}
                </span>

                <div class="text-center">
                    <h3 class="sbold">Arrastre su archivos aquí u oprima click para subir</h3>
                </div>

                {{Form::close()}}

                <br>


                <div class="text-center">
                    <button type="button" class="btn red" data-dismiss="modal">
                            <i class="fa fa-ban"></i>
                            Cerrar
                    </button>

                    </div>

            </modal>

<!--edicion modal -->
<modal id="editar-documentos" title="Editar documentación">
                <form @submit.prevent="update(fillDocumentos.PK_id)">
        <br>
        <br>
        <div class ="text-center">
            <div class="form-group" >
                <h3 v-text="fillDocumentos.url"></h3>
                <label class="control-label">Tipo de documento</label>
                <select id="tidocu" name="FK_TipoDocumentoId" class="form-control select2" v-model="fillDocumentos.FK_TipoDocumentoId" required>
                    <option v-for="tiposDocumento in tiposDocumentos" v-bind:value="tiposDocumento.PK_id"> @{{ tiposDocumento.nombre }}
                    </option>
                </select>
                <span v-if="formErrorsUpdate['FK_TipoDocumentoId']" class="error text-danger">
                                                    @{{formErrorsUpdate.FK_TipoDocumentoId[0]}}
                </span>
                <input hidden type="text" name="url" v-model="fillDocumentos.url" required>
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

    <link rel="stylesheet" href="/assets/global/plugins/bootstrap-toastr/toastr.min.css" />

    <link href="../assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />






@endpush

@push('functions')


    <script src="../assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
    <script>

    window.proyectId =  {{$co->pivot->FK_ProyectoId}} ;
    </script>

    <script src="/js/documentos.js"></script>


    <script src="../assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
    <script src="../assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>

    <script>
        Dropzone.options.myAwesomeDropzones = {
            uploadMultiple: false,
            maxFilezise: 1000,
            maxFiles: 5,
            acceptedFiles: '.pdf',
            addRemoveLinks: true,
            dictRemoveFile: "Retirar archivo",
            success: function(a) {
                toastr.info('Documento subido correctamente');
                return a.previewElement ? a.previewElement.classList.add("dz-success") : void 0
            },
        };
    </script>



@endpush



@push('plugins')


@endpush
