@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', [
            'icon' => 'fa fa-files-o', 
            'title' => 'Evaluar Documento: ' .  $documento->tipo->nombre 
        ])

        <div class="row">
            <div class="col-sm-7" id="pdf-container">
                <a href="{{ $documento->url }}" class="media"></a>
            </div>
            <div class="col-sm-5">
                <div id="app">
                    <div id="accordion" class="panel-group">
                        <div class="panel panel-default" v-for="(componente, index) in evaluations">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" :href="'#collapse' + index">
                                        @{{ componente.nombre }}
                                       
                                    </a>
                                     
                                    <span class="pull-right fa" :class="indicator(componente)"></span>
                                       
                                </h4>
                            </div>
                            <div :id="'collapse' + index" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p class="text-center">
                                        @{{ componente.descripcion }}
                                    </p>
                                    <hr>
                                    {{--  Formulario para actualizar nota de componente  --}}
                                    <form @submit.prevent="update(componente)" >
                                        <div class="form-group">
                                            <label>Observación</label>
                                                <textarea rows="2" class="form-control" style="resize: none" v-model="componente.pivot.observacion">
                                            </textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 text-center">
                                                <bs-switch :id="index" label="VALIDO" v-model="componente.pivot.checked" :options="switchOptions"/>
                                            </div>
                                            <div class="col-sm-6 text-center">
                                                <button type="submit" class="btn blue">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
        
        @endcomponent
    </div>
@endsection

@push('functions')
    <script src="/assets/global/plugins/jquery.media.js"></script>
    <script>
        window.documentoId = "{{ $documento->PK_id }}"
        $(() => {
            let pdf = $('#pdf-container');
            $('a.media').media({ width: pdf.width(), height: 500 });
        })
    </script>
    <script src="/js/evaluator-docs.js"></script>
@endpush