@extends('layouts.admin-dash')

@push('styles')
<!-- Datatables Styles -->
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endpush

@section('content')
    <div class="col-md-12">
            <h3 class="text-center">CONFIGURACIÓN TIPOS DE DOCUMENTO</h3>
    </div>
  </div>
    <div class="col-md-12">
  <div class="panel-body">
                  {{--<a href="{!!URL::to('novedades/show/createcn')!!}"><button type="button" class="btn btn-info">Crear "Mi Novedad" <i class="fa fa-plus fa-fw"></i></button></a>--}}


                  <br>
                  <br>

                    <table class="display nowrap" id='documento'>
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
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
  </div>
</div>

@endsection
@push('functions')
    <script src="http://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="/js/DataTable.js"></script>
@endpush
