<div class="col-md-12">
    @component('components.portlet', ['icon' => 'fa fa-home', 'title' => 'Proyectos Asignados'])
        <div id="app" class="row">
            <div class="col-md-6">
                <proyecto-panel :proyecto="proyecto" v-for="proyecto in proyectos" :key="proyecto.PK_id"/>
            </div>
        </div>
    @endcomponent
</div>



@push('functions')
    <script src="/js/evaluator-proyectos.js"></script>
@endpush