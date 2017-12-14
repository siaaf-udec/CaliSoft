import "./bootstrap";
import Vue from "vue";
import VueCodeMirror from 'vue-codemirror';
import CodePreview from '../components/scripts/code-preview'

Vue.use(VueCodeMirror);

new Vue({
    el: "#app",
    components: {CodePreview},
    data:{
        proyectoId: window.proyectoId,        
        sql: [],
        basedato: null,
        formErrors: {},
       
    },
    created(){
        axios.get(`/api/proyectos/${window.proyectoId}/basedatos/`)
        .then(response => this.basedato = response.data[0]);
    }

});