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
        axios.all([
                axios.get('/api/proyectos/categorias'),
                axios.get('/api/proyectos/semilleros'),
                axios.get('/api/proyectos/grupos')
            ])
            .then(axios.spread((cat, sem, gru) => {
                this.categorias = cat.data;
                this.semilleros = sem.data;
                this.grupos = gru.data;
            }));
    },
    methods: {
        store() {
            axios.post('/api/proyectos/', this.proyecto)
                .then(res => location.href = '/student/Proyectos')
                .catch(e => this.errors = e.response.data);
        },
    }
});
