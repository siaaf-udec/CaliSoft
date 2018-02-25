<template>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-header" style="display: inline">{{ proyecto.nombre }}</h4>
            <div class="pull-right">
                <dropdown v-if="proyecto.state == 'evaluacion'" v-model="dropdown">
                    <button class="btn btn-xs" @click="dropdown=true">
                        EVALUACIÓN
                        <span class="caret"></span>
                    </button>
                    <template slot="dropdown">
                        <li><a :href="modelacion" class="text-primary">MODELACIÓN</a></li>
                        <li><a :href="plataforma" class="text-warning">PLATAFORMA</a></li>
                        <li><a :href="codificacion" class="text-success">CODIFICACIÓN</a></li>
                        <li><a :href="basedatos" class="text-danger">BASES DE DATOS</a></li>
                    </template>
                </dropdown>
                <div v-else>
                    <em>El proyecto todavia no se encuentra listo para evaluación</em>
                </div>
            </div>
        </div>
        <proyecto-eval :proyecto="proyecto"></proyecto-eval>
        <div class="panel-footer">
            <div class="row" v-if="evaluacion">
                <div class="col-sm-6">
                    <button class="btn btn-block btn-xs btn-danger">Volver a activar proyecto</button>
                </div>
                <div class="col-sm-6">
                    <button class="btn btn-block btn-xs btn-success">Terminar Evaluación</button>
                </div>
            </div>
            <div class="row" v-if="completado">
                <div class="col-sm-6">
                    <button class="btn btn-block btn-xs btn-danger">Volver a evaluar proyecto</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { Dropdown } from 'uiv'
import ProyectoEval from './proyecto-eval'
import UrlsMixin from '../mixins/proyecto-urls'
import EstadoMixin from '../mixins/proyecto-estados'

export default {
    mixins: [UrlsMixin, EstadoMixin],
    props: {
        proyecto: {type: Object, required: true}
    },
    components: {
        Dropdown,
        ProyectoEval
    },
    data() {
        return { dropdown: false }
    }
};
</script>
