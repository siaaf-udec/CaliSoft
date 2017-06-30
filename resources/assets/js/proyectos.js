import "./bootstrap";
import Vue from "vue";
import BsSelect from "../components/bs-select";


new Vue({
    el: '#app',
    components: { BsSelect },
    data: {
        categorias: [],
        semilleros: [],
        grupos: [],
        proyecto: {},
        errors: {}
    },
    created() {
        Promise.all([
            axios.get('/api/proyectos/categorias'),
            axios.get('/api/proyectos/semilleros'),
            axios.get('/api/proyectos/grupos')
        ]).then(results => {
            this.categorias = results[0].data;
            this.semilleros = results[1].data;
            this.grupos = results[2].data;
        });
    },
    methods: {
        store() {
            axios.post('/api/proyectos/', this.proyecto)
                .then(res => location.href = '/student/Proyectos')
                .catch(e => this.errors = e.response.data);
        },
    }
});
