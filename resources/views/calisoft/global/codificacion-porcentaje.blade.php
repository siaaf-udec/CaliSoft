@extends('layouts.dash')

@section('content')
<div class="col-md-12">
    @component('components.portlet', ['icon' => 'fa fa-code', 'title' => 'Codificación'])
        <div id="app">
            <porcentaje-cod :items="items">
            </porcentaje-cod>
            
        </div>

    @endcomponent
</div>
@endsection
 @push('functions')
    <script src="/js/items-show.js"></script>    
 @endpush