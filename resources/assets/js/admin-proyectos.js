import "./bootstrap";
import Vue from "vue";
import proyectoTabla from "../components/proyecto-tabla";

let vm = new Vue({
    el: '#app',
    components: { proyectoTabla },
    data: { proyectos: [], seleccion: {} },
    created() {
        axios.get('/api/proyectos').then(res => this.proyectos = res.data);
    },

    methods: {
        seleccionar(proyecto) {
            this.seleccion = proyecto;
        }
    }

});