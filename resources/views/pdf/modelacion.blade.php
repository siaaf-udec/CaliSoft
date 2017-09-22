@extends('pdf.master')

@section('body')
    <div class="text-center">
        <h1>{{ $proyecto->nombre }} - Evaluación de modelado</h1>
    </div>
    @foreach($proyecto->documentos as $documento)
        @if($documento->evaluaciones->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>{{ $documento->tipo->nombre }}</th>
                        <th>Archivo: {{ $documento->nombre }}</th>
                        <th>Observación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documento->evaluaciones as $componente)
                        <tr>
                            <td>{{ $componente->nombre }}</td>
                            <td >
                                @if($componente->pivot->checked)
                                    <span class="glyphicon glyphicon-ok text-success"></span>
                                @else
                                    <span class="glyphicon glyphicon-remove text-danger"></span>
                                @endif
                            </td>
                            <td>
                                <div class="text-justify">
                                    {{ $componente->pivot->observacion }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif  
    @endforeach
@endsection