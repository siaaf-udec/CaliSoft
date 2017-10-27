import './bootstrap'
import Vue from 'vue'
import VueCodeMirror from 'vue-codemirror';
import CodePreview from './components/scripts/code-preview'
import TablaItems from './components/scripts/tabla-items'
import TextareaInput from './components/inputs/textarea-input';

Vue.use(VueCodeMirror);

new Vue({
    el: '#app',
    components: { CodePreview, TablaItems, TextareaInput },
    data: {
        observacion: "",
        items: []
    },
    created() {
        this.refresh();

    },
    methods: {
        refresh() {

            axios.get('/api/evaluacionesScript/' + window.ScriptId).then(response => {
                this.items = response.data
            });
        }

    }
})