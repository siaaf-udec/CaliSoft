@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', [
            'icon' => 'fa fa-files-o', 
            'title' => 'Modelación: ' . $proyecto->nombre 
        ])

        <div id="app">
            <document-list :documentos="documentos" :tipos="tipos">
                <template slot="buttons" scope="props">
                    <a title="calificar" class="btn btn-warning btn-xs" @click.prevent="open(props.doc)">
                        <span class="fa fa-asterisk"></span>
                    </a>
                </template>
            </document-list>

            <modal v-model="evModal" :footer="false" :header="false" size="lg">
                <div class="row">
                    <div class="col-md-12" id="pdf-container">
                        <bs-pdf id="doc-preview" :src="selected.url" v-if="selected.url" 
                            prefix="/api/seeFile/" container="#pdf-container"></bs-pdf>
                    </div>
                </div>
            </modal>
        </div>
        
            
        @endcomponent
    </div>
@endsection

@push('functions')
    <script>window.proyectoId = {{ $proyecto->PK_id }};</script>
    <script src="/assets/global/plugins/jquery.media.js"></script>
    <script src="/js/modelacion.js"></script>
@endpush