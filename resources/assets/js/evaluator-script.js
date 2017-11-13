import './bootstrap'
import Vue from 'vue'
import VueCodeMirror from 'vue-codemirror';
import CodePreview from './components/scripts/code-preview'
import TablaItems from './components/scripts/tabla-items'
import TextareaInput from './components/inputs/textarea-input';
import Modal from './components/utils/modal';

Vue.use(VueCodeMirror);

new Vue({
    el: '#app',
    components: { CodePreview, TablaItems, TextareaInput, Modal },
    data: {
        observacion: "",
        fillItem: {},
        formErrorsUpdate: {},
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
        },

    }
})