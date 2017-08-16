@component('components.nav-dropdown', ['icon' => 'fa fa-percent', 'title' => 'Porcentajes'])
    @component('components.nav-link', ['icon' => 'fa fa-book', 'link' => route('porcentajes'),'title' => 'Categorias'])
    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-code', 'link' => '#','title' => 'Codificación'])
    @endcomponent

    @component('components.nav-link', ['icon' => 'fa fa-database', 'link' => route('porcentajesbd'),'title' => 'Bases de Datos'])
    @endcomponent
@endcomponent