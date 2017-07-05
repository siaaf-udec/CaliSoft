@extends('layouts.admin-dash')
@section('content')
<div class="col-md-12">
    @component('components.portlet', ['icon' => 'fa fa-folder-open', 'title' => 'Proyectos'])
    <div id="app">
      <div class="row">
        @component('components.select', [
            'name' => 'categoria',
            'title' => 'Categoria',
            'items' => $categorias,
            'value' => 'PK_id',
            'label' => 'nombre'
        ])
        @endcomponent

      </div>

    </div>
    @endcomponent
@endsection
@push('styles')
    <link rel="stylesheet" href="/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css">
@endpush

@push('functions')
    <script src="/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
@endpush
