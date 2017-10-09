@extends('pdf.master')

@section('body')
    <div class="text-center">
        <h1>{{ $proyecto->nombre }} - Evaluación de modelado</h1>
    </div>
    
    @foreach($documentos as $documento)
        @if($documento->evaluaciones->count())
            <div class="text-center">
                <h4>{{ $documento->nombre}} ({{ $documento->tipo->nombre }})</h4>
            </div>
            @each('pdf.sections.document', $documento->evaluaciones->groupBy('evaluador.name'), 'evaluaciones')
        @endif  
    @endforeach
@endsection