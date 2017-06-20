@extends('layouts.admin-dash')
@section('content')
    <div class="col-sm-5 col-sm-offset-1" style="">
            <h3 class="text-center">CONFIGURACIÓN DE PORCENTAJES</h3>
    </div>
    <div class="form-group">
	{!!Form::label('categoria','Categoria: ')!!}
	{!!Form::select('nombre',$catego)!!}
    </div>


@endsection
@push('functions')
    <script src="/js/categorias.js"></script>
@endpush