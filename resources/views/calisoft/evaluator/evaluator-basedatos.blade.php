@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', [
            'icon' => 'fa fa-files-o', 
            'title' => 'Nomenclatura: ' . $proyecto->nombre
            ])
            <div id="app">
                <div class=row>
                    <div class="col-md-6">
                        <h5><center><strong>Codigo SQL</strong></center></h5>
                        <code-preview url="{{$proyecto->sql->url}}" prefix="/api/sql/preview/" mode="text/x-sql"></code-preview>                  
                    </div>
                    <div class="col-md-6">
                        <h5><center><strong>Información</strong></center></h5>
                        <tabla-componente ></tabla-componente>  
                        <form method="POST" >
                            {{method_field('PUT')}}
                            {{csrf_field()}}               
                                    @component('components.textarea',[
                                        'name'=>'comentario',
                                        'attributes'=>'',
                                        'label'=>'Comentario',
                                        'value'=>'',
                                    ])
                                    @endcomponent
                            <button type="submit"  class="btn green-jungle center-block">
                            <i class="fa fa-edit"></i> Aceptar Calificación</button>
                        </form>
                    </div>
                </div>
            </div>                
        @endcomponent  
    </div>
@endsection
@push('functions')
    <script>window.archivoId = "{{ $proyecto->sql->PK_id }}"</script>
    <script src="/assets/global/plugins/jquery.media.js"></script>
    <script src="/js/base-datos.js"></script>
@endpush