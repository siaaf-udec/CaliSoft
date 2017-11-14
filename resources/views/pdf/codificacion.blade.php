@extends('pdf.master')

@section('body')
    <div class="text-center">
        <h1>{{ $proyecto->nombre }} - Evaluación de codificacion</h1>
    </div>
    
    @foreach($scripts as $script)
        
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>{{ $script->url }}</th>
                        
                    </tr>
                    <tr>
                        <th colspan="2">
                            items
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                @foreach($script->items as $item)
                    <tr>
                        <td>
                        {{$item->item}}
                        </td>
                        <td>
                        {{$item->pivot->nota}}
                        </td>
                    </tr>
                 @endforeach   
                </tbody>
                
            </table>
          
    @endforeach
@endsection