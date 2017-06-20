import "./bootstrap";
import Vue from "vue";

new Vue({
    el: '#app',
    data: {
        categorias: [],
        offset: 4,
        formErrors: {},
        formErrorsUpdate: {},
        newCategoria: {},
        fillCategoria: {},

    },
    created() {
        axios.get('/api/categorias')
            .then(response => {
                this.categorias = response.data;
            });
    },
    methods: {
        store() {
            axios.post('/api/categorias', this.newCategoria)
                .then(response => {
                    this.categorias.push(response.data);
                    this.newCategoria = {};
                    $("#crear-categoria").modal("hide");

                });
        },
        openEditModal(categoria) {
            this.fillCategoria = Object.assign({}, categoria);
            $('#editar-categoria').modal("show");
        }

    }

});