@extends('layouts.student-dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', ['icon' => 'fa fa-home', 'title' => 'Proyecto de grado'])
            @can('create', 'App\Proyecto')
                <p class="text-justify">
                    Todavia no has creado una propuesta de proyecto,
                    puedes crearla <a href="{{ route('proyectos') }}">Aqui.</a>
                </p>
            @else
                <div id="app">
                    <proyecto-vista></proyecto-vista>
                </div>
            @endcan

        @endcomponent
    </div>

@endsection

@cannot('create', 'App\Proyecto')
  @push('functions')
    <script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
    <script src="/js/proyectos.js"></script>
  @endpush

  @push('styles')
    <link rel="stylesheet" href="/assets/global/plugins/bootstrap-toastr/toastr.min.css">
  @endpush
@endcannot
