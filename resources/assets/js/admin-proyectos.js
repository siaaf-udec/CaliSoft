import "./bootstrap";
import Vue from "vue";
import proyectoTabla from "../components/proyecto-tabla";
import BsSelect from "../components/bs-select";

let vm = new Vue({
    el: '#app',
    components: { proyectoTabla, BsSelect },
    data: {
        proyectos: [],
        seleccion: {},
        paginacion: {},
        categoriaId: null
    },

    created() {
        //axios.get('/api/proyectos').then(res => this.proyectos = res.data);
        this.refresh('/api/proyectos');
    },

    methods: {
        seleccionar(proyecto) {
            this.seleccion = proyecto;
        },
        refresh(url, params) {
            //axios.get('/api/proyectos').then(res => this.proyectos = res.data);
            if (!url) return;
            axios.get(url, { params }).then(response => {
                this.paginacion = response.data;
                this.proyectos = this.paginacion.data;
            });
        },
        update(proyecto){
            this.seleccion = proyecto;
            this.proyectos = this.proyectos.map(pro => {
                return pro.PK_id == proyecto.PK_id ? proyecto : pro;
            });
        },
        remove(proyecto){
            this.seleccion = {};
            this.proyectos = this.proyectos.filter(pro => pro.PK_id != proyecto.PK_id);
        }
    },
    watch: {
        categoriaId(val) {
            let params = { page: this.paginacion.current_page };
            if (val) params.categoriaId = val;
            this.refresh('/api/proyectos', params);
        }
    }
});
