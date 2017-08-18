@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', ['icon' => 'fa fa-database', 'title' => 'Documento de Base de Datos'])
            <div id="app">
                <button type="button"   class="btn blue center-block">
                    <i class="fa fa-plus"></i>
                        Subir Documentos
                </button>
                <modal  title="Subir Archivo Sql">
                    <form action="" id="my-awesome-dropzone" method="post" class="dropzone">
                        {{ csrf_field() }}
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
<script src="/js/archivo-sql.js"></script>
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