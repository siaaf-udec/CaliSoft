@extends('layouts.admin-dash')


@section('content')
    <div id="app">
        {{ $documento->nombre }}
    </div>

@endsection


@push('functions')
    <script>
        window.documentId = {{ $documento->PK_id }};
    </script>
    <script src="/js/componentes.js"></script>
@endpush
