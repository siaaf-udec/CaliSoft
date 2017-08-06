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

@can('create', 'App\Proyecto')
    @push('functions')
        <script src="/js/bootstrap.js"></script>
    @endpush
@endcan

@cannot('create', 'App\Proyecto')
  @push('functions')
    <script src="/js/proyectos.js"></script>
  @endpush
@endcannot
