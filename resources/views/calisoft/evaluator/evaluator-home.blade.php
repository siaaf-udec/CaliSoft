<div class="col-md-12">
    @component('components.portlet', ['icon' => 'fa fa-home', 'title' => 'Proyectos Asignados'])
        <div id="app">
            <div class="well well-sm" v-for="proyecto in proyectos">
                <h3>@{{ proyecto.nombre }}</h3>
            </div>
        </div>
    @endcomponent
</div>



@push('functions')
    <script src="/js/evaluator-proyectos.js"></script>
@endpush