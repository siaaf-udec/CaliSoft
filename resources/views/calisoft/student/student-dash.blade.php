@can('create', 'App\Proyecto')
    @component('components.nav-link', [
        'icon' => 'fa fa-pencil-square',
        'title' => 'Registro Proyecto',
        'link' => route('proyectos'),
    ])
    @endcomponent
@endcan

@can('upload', 'App\Proyecto')
    @component('components.nav-dropdown', ['icon' => 'fa fa-book', 'title' => 'Documentos'])
        @component('components.nav-link', ['icon' => 'fa fa-book', 'link' => route('documentacion'), 'title' => 'Modelación'])
        @endcomponent

        @component('components.nav-link', ['icon' => 'fa fa-code', 'link' => route('documentosCodificacion'),'title' => 'Codificación'])
        @endcomponent

        @component('components.nav-link', ['icon' => 'fa fa-database', 'link' => route('documentosBd'),'title' => 'Base De Datos'])
        @endcomponent
    @endcomponent

    @component('components.nav-dropdown', ['icon' => 'fa fa-check', 'title' => 'Evaluación'])

        @component('components.nav-link', ['icon' => 'fa fa-users', 'link' => '#', 'title' => 'Evaluadores'])
        @endcomponent

        @component('components.nav-link', [
            'icon' => 'fa fa-bar-chart-o', 
            'title' => 'Modelación',
            'link' => route('evalucion.modelacion')
        ])
        @endcomponent

        @component('components.nav-link', ['icon' => 'fa fa-cubes', 'link' => '#', 'title' => 'Plataforma'])
        @endcomponent

    @endcomponent


    @component('components.nav-link', ['icon' => 'fa fa-database', 'link' => route('modelobd'), 'title' => 'Modelación Base de Datos'])
    @endcomponent
@endcan

@component('components.nav-dropdown', ['icon' => 'fa fa-percent', 'title' => 'Porcentajes'])
    @component('components.nav-link', ['icon' => 'fa fa-book', 'link' => route('porcentajes'),'title' => 'Categorias'])
    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-code', 'link' => route('porcentajesCod'),'title' => 'Codificación'])
    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-database', 'link' => route('porcentajesbd'),'title' => 'Bases de Datos'])
    @endcomponent
@endcomponent





