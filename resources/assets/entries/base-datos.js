import "./bootstrap";
import Vue from "vue";
import VueCodeMirror from 'vue-codemirror';
import CodePreview from '../components/scripts/code-preview'
import TablaComponente from '../components/archivobd/tabla-componente'

Vue.use(VueCodeMirror);

new Vue({
    el: "#app",
    components: {CodePreview, TablaComponente},
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