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
                    $("#mensaje-bien").fadeIn();

                })
                .catch(error => this.formErrors = error.response.data);
        },
        openEditModal(categoria) {
            this.fillCategoria = Object.assign({}, categoria);
            $('#editar-categoria').modal("show");
        },
        update() {
            axios.put('/api/categorias/' + this.fillCategoria.PK_id, this.fillCategoria)
                .then(response => {
                    this.categorias = this.categorias.map(value => {
                        return value.PK_id == this.fillCategoria.PK_id ? this.fillCategoria : value;
                    });
                    this.fillCategoria = {};
                    $("#editar-categoria").modal("hide");
                    $("#mensaje-editado").fadeIn();
                })
                .catch(error => this.formErrorsUpdate = error.response.data);
        },

        destroy(categoria) {
            axios.delete('/api/categorias/' + categoria.PK_id)
                .then(() => {
                    this.categorias = this.categorias.filter(value => value != categoria);
                    $("#mensaje-eliminado").fadeIn();
                });

        }



    }

});