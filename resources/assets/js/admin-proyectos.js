import "./bootstrap";
import Vue from "vue";
import proyectoTabla from "./components/proyecto-tabla";
import BsSelect from "./components/bs/bs-select";
import Paginator from './components/classes/paginator';
import { Pagination } from 'uiv'

let vm = new Vue({
    el: '#app',
    components: { proyectoTabla, BsSelect, Pagination },
    data: {
        proyectos: [],
        seleccion: {},
        paginator: new Paginator([], 9),
        estado: "",
        search: ""
    },

    created() {
        axios.get('/api/proyectos').then(response => {
            this.proyectos = this.paginator.data = response.data
        });
    },

    methods: {
        update(proyecto){
            this.seleccion = proyecto;
            this.proyectos = this.proyectos.map(pro => {
                return pro.PK_id == proyecto.PK_id ? proyecto : pro;
            });
        },
        remove(proyecto){
            this.seleccion = {};
            this.proyectos = this.paginator.data = this.proyectos.filter(pro => pro.PK_id != proyecto.PK_id);
        }
    },
    watch: {
        
    }
});
