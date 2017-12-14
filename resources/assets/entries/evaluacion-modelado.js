import './bootstrap'
import Vue from 'vue'
import DocList from '../components/evaluaciones/modelacion/doc-list'
import EvaluationPanel from '../components/evaluaciones/modelacion/evaluation-panel'

new Vue({
    el: '#app',
    components: {
        DocList,
        EvaluationPanel
    },
    data() {
        return {
            documentos: [],
            selected: null
        }
    },
    created() {
        axios.get('/api/evaluacion/modelado').then(res => this.documentos = res.data)
    }
})