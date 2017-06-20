@extends('layouts.admin-dash')

@section('content')
    <div id="app">
        <div class="col-sm-5 col-sm-offset-1" style="">
            <h3 class="text-center">Semilleros</h3>
            <list-group-crud rest="/api/semilleros/"></list-group-crud>
        </div>
        <div class="col-sm-5" style="">
            <h3 class="text-center">Grupos de investigacion</h3>
            <list-group-crud rest="/api/grupos-de-investigacion/"></list-group-crud>
        </div>
    </div>
@endsection


@push('functions')
    <script src="/js/semilleros.js"></script>
@endpush