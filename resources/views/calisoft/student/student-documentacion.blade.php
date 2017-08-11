@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', ['icon' => 'fa fa-book', 'title' => 'Documentos'])
            <div id="app">
                
                {{--  Progreso de los documentos  --}}
                <document-progress :documentos="documentos" :tipos="tiposDocumentos"></document-progress>

                {{--  Tabla de documentos  --}}
                <document-list :documentos="documentos" :tipos="tiposDocumentos"  @edit="openEditModal" @destroy="destroy">
                </document-list>
         
                {{-- Boton de subir documento --}}
                <button type="button"  @click.prevent="modalState = true" class="btn blue center-block">
                    <i class="fa fa-plus"></i>
                    Subir Documento
                </button>             

                {{-- Creacion de documento   --}}
                <modal v-model="modalState" title="Subir documentación" @hide="refresh()" :footer="false">
                    <form action="/api/file" id="my-awesome-dropzone" method="post" class="dropzone">
                        {{ csrf_field() }}
                        
                        
                        {{--  Select Tipo Documento  --}}
                        
                            <div class="form-group">
                                <label>Tipo de documento</label>
                                <bs-select id="tidocu" name="FK_TipoDocumentoId" class="form-control select2" v-model="newDocumentos.FK_TipoDocumentoId" required>
                                    <option v-for="tiposDocumento in tiposDocumentos" v-bind:value="tiposDocumento.PK_id"> @{{ tiposDocumento.nombre }}
                                    </option>
                                </bs-select>
                            </div>
                       

                    

                        

                    </form>
                </modal>
                
                {{-- Modal de Edicion --}}
                <modal v-model="editModalState" title="Editar documentación" :footer="false">
                    <form @submit.prevent="update(fillDocumentos.PK_id)">
        
        
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
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn blue"><i class="fa fa-plus"></i>Modificar Documento</button>
                            <button type="button" class="btn red" @click="editModalState = false">
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

    <link href="../assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />

@endpush

@push('functions')

    <script src="/js/documentos.js"></script>
    <script src="../assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
    <script src="../assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>

    <script>
        Dropzone.options.myAwesomeDropzone = {
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
            error(file, message, xhr){
                this.removeFile(file);
                let response = JSON.parse(xhr.responseText);
                for(error in response) toastr.error(response[error]);
            }
        };
    </script>



@endpush



@push('plugins')


@endpush
