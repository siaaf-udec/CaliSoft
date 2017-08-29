import './bootstrap'
import Vue from 'vue'
import BsSwitch from './components/bs/bs-switch'
import TextareaInput from './components/inputs/textarea-input';

new Vue({
    el: '#app',
    components: {
        BsSwitch,
        TextareaInput,
    },
    data() {
        return {
            evaluations: [],
            documentoId: window.documentoId,
            switchOptions: {
                onText: 'SI',
                offText: 'NO',
                onColor: 'success',
                offColor: 'danger'
            }
        }
    },
    created() {
        axios.get('/api/evaluaciones/' + this.documentoId)
            .then(res => this.evaluations = res.data)
    },
    methods: {
        update(componente) {
            let payload = {
                componente_id: componente.PK_id,
                checked: componente.pivot.checked,
                observacion: componente.pivot.observacion
            }
            axios.put('/api/evaluaciones/' + this.documentoId, payload).then(() => {
                toastr.info(`Componente: ${componente.nombre} ha sido calificado!`);
            })
        },
        indicator(componente) {
            return {
                'fa-times-circle text-danger': !componente.pivot.checked,
                'fa-check-circle text-success': componente.pivot.checked
            }
        }
    }
})