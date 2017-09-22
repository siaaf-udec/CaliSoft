import "./bootstrap";
import Vue from "vue";
import Paginator from './components/classes/paginator';
import { Pagination } from "uiv";

new Vue({
    el: "#app",
    components: { Pagination },
    data: {
        proyectoId: window.proyectoId,
        script: [],
        formErrors: {},
        formErrorsUpdate: {},
        paginator: new Paginator(),
        search: "",
    },
    created() {
        this.refresh();
    },
    methods: {
        refresh() {
            axios.get(`/api/proyectos/${window.proyectoId}/scripts`)
                .then(response => this.script = this.paginator.data = response.data);
        },
    },
    watch: {
        search(query) {
            this.paginator.data = this.script.filter(script => {
                return new RegExp(query, 'ig')
                    .test(`${script.url}`)
            })
        }
    }


});