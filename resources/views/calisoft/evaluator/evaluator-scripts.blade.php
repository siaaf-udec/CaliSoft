@extends('layouts.dash')
@section('content')
        <div class="col-md-12">
            @component('components.portlet', [
            'icon' => 'fa fa-files-o', 
            'title' => 'Evaluar Documento: '.$script->url 
            ])
            <div class="row">
                <div id="app">
                    <div class="col-md-6">
                        <code-preview url="{{$script->url}}"></code-preview>
                    </div>
                    <div class="col-md-6">
                        <button type="button"  class="btn green-jungle center-block">
                            <i class="fa fa-arrow-circle-right"></i>
                            Calificación Automatica
                        </button>
                        <br>
                        <tabla-items :items="items"></tabla-items>
                        @component('components.textarea',[
                            'name' => 'observacion',
                            'attributes' => "required",
                            'label' => 'Observación',
                            'help' => 'Comentario',
                            
                        ])
                            
                        @endcomponent
                    </div>
                </div>
            </div>
        @endcomponent
            
        </div>
        
            
@endsection
@push('functions')
    <script src="/assets/global/plugins/jquery.media.js"></script>
    <script src="/js/evaluator-script.js"></script>
@endpush