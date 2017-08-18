@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', ['icon' => 'fa fa-code', 'title' => 'Documentos de Codificación'])
            <div id="app">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%">
                        <thead>
                            <th class="text-center">Nombre Del Archivo</th>
                            <th class="text-center">estado</th>
                            <th class="text-center">operaciones</th>
                        </thead>
                        <tbody >
                            <tr v-for="scripts in script" class="text-center">
                                <td v-text="scripts.url"></td>
                                <td v-text="scripts.estado"></td>
                                <td class="text-center">
                                    <button class="editar-modal btn red " title="Eliminar documento" @click.prevent="openDeleteModal(scripts)">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </td>
                            </tr>    
                        </tbody>
                    </table>
                </div>
                <button type="button"  @click.prevent="modalState = true" class="btn blue center-block">
                    <i class="fa fa-plus"></i>
                    Subir Documentos

                </button>
                <modal v-model="modalState" title="Subir documentación De Codificación" @hide="refresh()" :footer="false">
                    <form action="/api/fileScript" id="my-awesome-dropzone" method="post" class="dropzone">
                        {{ csrf_field() }}
                    </form>
                </modal>
                <!-- inicio modal eliminar-->
        <modal v-model="deleteModalState" title="Eliminar script">
            ¿Desea eliminar el script @{{elimiScript.url}}?

            <div class="modal-footer" slot="footer">
                <button class="btn green-jungle" @click="destroy(elimiScript)">
                    <i class="fa fa-edit"></i>Eliminar Script
                </button>
                <button type="button" class="btn red" @click.prevent="closeDeleteModal()">
                    <i class="fa fa-ban"></i>Cancelar
                </button>
            </div>
        </modal>
        <!-- Fin Modal Eliminar -->

            </div>
        @endcomponent
    </div>
@endsection

@push('styles')
<link href="../assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('functions')
<script src="/js/scripts-codificacion.js"></script>
<script src="/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="/assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
<script src="/assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>

<script>
        Dropzone.options.myAwesomeDropzone = {
            uploadMultiple: false,
            maxFilezise: 1000,
            maxFiles: 5,
            acceptedFiles: '.php',
            addRemoveLinks: true,
            dictRemoveFile: "Retirar archivo",
            success: function(a) {
                toastr.info('Documento subido correctamente');
                return a.previewElement ? a.previewElement.classList.add("dz-success") : void 0
            },
            
        };
    </script>

@endpush