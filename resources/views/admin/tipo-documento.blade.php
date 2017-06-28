@extends('layouts.admin-dash')

@section('content')
<div class="col-md-12">
    @component('components.portlet', ['icon' => 'fa fa-book', 'title' => 'Documentos'])
        <div id="app">

            {{-- List Group --}}
            <div class="list-group">
                <div class="list-group-item" v-for="tdoc in tdocumentos">
                    <h4 class="list-group-item-heading" style="display: inline">
                        @{{ tdoc.nombre }}
                        <span class="label label-primary" v-if="tdoc.required">requerido</span>
                    </h4>

                    <div class="btn-group pull-right">
                        <a :href="`/admin/tdocumentos/${tdoc.PK_id}/componentes`" class="btn blue btn-xs">
                            componentes
                        </a>
                        <button type="button" class="btn yellow-gold btn-xs">editar</button>
                        <button type="button" class="btn red btn-xs">eliminar</button>
                    </div>
                </div>
            </div>

        </div>
    @endcomponent
</div>
@endsection

@push('functions')
    <script src="/js/tipo-documento.js"></script>
@endpush

{{--
@push('styles')
<!-- Datatables Styles -->
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endpush
--}}
