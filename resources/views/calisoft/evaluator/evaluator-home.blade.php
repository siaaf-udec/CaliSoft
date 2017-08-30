<div class="col-md-12">
    @component('components.portlet', ['icon' => 'fa fa-home', 'title' => 'Proyectos Asignados'])
        <div id="app">
            <div class="panel-group">
                <div class="panel panel-info" v-for="proyecto in proyectos">
                    <div class="panel-heading">
                        <h4 class="panel-header" style="display: inline">@{{ proyecto.nombre }}</h4>
                        <div class="btn-group pull-right">
                            <a :href="`/proyectos/${proyecto.PK_id}/modelacion`" class="btn btn-xs btn-primary">modelación</a>
                            <a href="#" class="btn btn-xs btn-warning">Plataforma</a>
                            <a href="#" class="btn btn-xs btn-success">Codificación</a>
                            <a href="#" class="btn btn-xs btn-danger">Base de datos</a>



                        </div>
                    </div>
                    <div class="panel-body"></div>
                </div>
            </div>
        </div>
    @endcomponent
</div>



@push('functions')
    <script src="/js/evaluator-proyectos.js"></script>
@endpush