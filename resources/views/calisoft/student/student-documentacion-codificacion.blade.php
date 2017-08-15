@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', ['icon' => 'fa fa-code', 'title' => 'Documentos de Codificación'])
            <div id="app">
                <button type="button"  @click.prevent="modalState = true" class="btn blue center-block">
                    <i class="fa fa-plus"></i>
                    Subir Documentos
                    
                </button>
            </div>
        @endcomponent
    </div>
@endsection

@push('functions')
<script src="js/scripts-codificacion.js"></script>
<script src="/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
@endpush