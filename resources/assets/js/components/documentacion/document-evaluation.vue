<template>
    <div id="accordion" class="panel-group">
        <div class="panel panel-default" v-for="(componente, index) in evaluations" :key="componente.PK_id">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" :href="'#collapse' + index">
                        {{ componente.nombre }}
                    </a>
                    <span class="pull-right fa" :class="indicator(componente)"></span>
                </h4>
            </div>
            <div :id="'collapse' + index" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="text-center">
                        {{ componente.descripcion }}
                    </div>
                    <div class="text-center text-info" v-if="(!editable && componente.pivot.observacion)">
                        <hr>
                        <strong>Observacion:</strong>
                        {{ componente.pivot.observacion }}
                    </div>
                    <div v-if="editable">
                        <hr>
                        <evaluation-form :evaluation="componente" @update="update" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import EvaluationForm from './evaluation-form'

export default {
    components: {
        EvaluationForm
    },
    props: {
        documentoId: { type: String, required: true },
        editable: { type: Boolean, default: false }
    },
    data() {
        return {
            evaluations: [],
        }
    },
    created() {
        axios.get('/api/evaluaciones/' + this.documentoId)
            .then(res => this.evaluations = res.data)
    },
    methods: {
        indicator(componente) {
            return {
                'fa-times-circle text-danger': !componente.pivot.checked,
                'fa-check-circle text-success': componente.pivot.checked
            }
        },
        update(componente) {
            let payload = this.getPayload(componente);
            axios.put('/api/evaluaciones/' + this.documentoId, payload).then(() => {
                toastr.info(`Componente: ${componente.nombre} ha sido calificado!`);
                this.evaluations = this.evaluations.map(
                    evaluation => evaluation.PK_id == componente.PK_id ? componente : evaluation
                )
            });
        },

        getPayload(componente) {
            return {
                componente_id: componente.PK_id,
                checked: componente.pivot.checked,
                observacion: componente.pivot.observacion
            }
        }
    }
}
</script>
