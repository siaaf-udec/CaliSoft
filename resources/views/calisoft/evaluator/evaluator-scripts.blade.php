@extends('layouts.dash')
@section('content')
        <div class="col-md-12">
            @component('components.portlet', [
            'icon' => 'fa fa-files-o', 
            'title' => 'Evaluar Documento: '.$script->url 
            ])
            @endcomponent
        </div>
            
@endsection
@push('functions')
    <script src="/assets/global/plugins/jquery.media.js"></script>
@endpush