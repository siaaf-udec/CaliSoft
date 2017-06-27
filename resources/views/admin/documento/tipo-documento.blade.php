@extends('layouts.admin-dash')

@section('content')
<div class="col-md-12">
    @component('components.portlet', ['icon' => 'fa fa-book', 'title' => 'Documentos'])
        <div id="app">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre Documento</th>
                        <th>Opcional</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tdocumentos as $tdocumento)
                        <tr>
                            <td>{{$tdocumento->nombre}}</td>
                            <td>{{$tdocumento->required}}</td>
                            <td>
                                <a href="{{ route('componentes', ['documento' => $tdocumento->PK_id]) }}" class="btn blue">
                                    Componentes
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endcomponent
</div>

{{--
@push('functions')
<script src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="/js/DataTable.js"></script>
@endpush

@push('styles')
<!-- Datatables Styles -->
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endpush
--}}
