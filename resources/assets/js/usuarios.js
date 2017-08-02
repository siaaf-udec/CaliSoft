import "./bootstrap";
import Vue from "vue";
import Modal from "./components/utils/modal";
import BsSelect from "./components/bs/bs-select"
import { Pagination } from "uiv";

new Vue({
    el: '#app',
    components: { Modal, BsSelect, Pagination },
    data: {
        newUser: {},
        usuarios: [],
        errors: {},
        deleteUser: {},
        paginacion: {},
        page: 1,
        role: ""
    },
    created() {
        this.refresh();
    },
    methods: {
        store() {
            axios.post('/api/usuarios', this.newUser)
                .then(response => {
                    this.usuarios.push(response.data);
                    this.newUser = {};
                    $("#crear-usuario").modal("hide");
                    toastr.success('Usuario Creado Correctamente');
                })
                .catch(error => {
                    this.errors = error.response.data
                });
        },
        openDeleteModal(user) {
            this.deleteUser = user;
            $('#eliminar-usuarios').modal("show");
        },
        destroy(user) {
            axios.delete('/api/usuarios/' + user.PK_id)
                .then(() => {
                    this.usuarios = this.usuarios.filter(value => value != user);
                    $('#eliminar-usuarios').modal("hide");
                    toastr.info('Usuario Eliminado Correctamente');
                });
        },
        refresh(page) {
            let params = { page };
            axios.get('/api/usuarios', { params }).then(response => {
                this.paginacion = response.data;
                this.usuarios = this.paginacion.data;
            });
        },
    },

    watch: {
        
    }


});
