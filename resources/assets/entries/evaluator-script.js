import './bootstrap'
import Vue from 'vue'
import VueCodeMirror from 'vue-codemirror';
import CodePreview from '../components/scripts/code-preview'
import TablaItems from '../components/scripts/tabla-items'
import TextareaInput from '../components/inputs/textarea-input';
import Modal from '../components/utils/modal';
import Validate from "../plugins/Validate"

Vue.use(VueCodeMirror);
Vue.use(Validate);
new Vue({
    el: '#app',
    components: { CodePreview, TablaItems, TextareaInput, Modal },
    data: {

        fillItem: {},
        formErrorsUpdate: {},
        items: [],
        fillComentario: {},

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


    },

})