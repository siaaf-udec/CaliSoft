import "./bootstrap";
import Vue from "vue";
import Modal from "./components/utils/modal";
import TextInput from "./components/inputs/text-input";
import EmailInput from "./components/inputs/email-input";
import PasswordInput from "./components/inputs/password-input";
import SelectInput from "./components/inputs/select-input";
import BsSelect from "./components/bs/bs-select"
import Paginator from './components/classes/paginator';
import { Pagination } from "uiv";

new Vue({
    el: '#app',
    components: { Modal, BsSelect, Pagination, TextInput, EmailInput, PasswordInput, SelectInput },
    data() {
        return {
            newUser: this.schema(),
            usuarios: [],
            errors: {},
            deleteUser: {},
            paginator: new Paginator(),
            search: ""
        }
    },
    created() {
        axios.get('/api/usuarios').then(response => {
            this.usuarios = this.paginator.data = response.data;
        });
    },
    methods: {
        store() {
            axios.post('/api/usuarios', this.newUser)
                .then(response => {
                    this.usuarios.push(response.data);
                    this.paginator.data = this.usuarios;
                    this.newUser = this.schema();
                    this.errors = {};
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
                    this.usuarios = this.paginator.data = this.usuarios.filter(value => value != user);
                    $('#eliminar-usuarios').modal("hide");
                    toastr.info('Usuario Eliminado Correctamente');
                });
        },

        schema() {
            return { name: "", email: "", password: "", password_confirmation: "", role: "" }
        }
    },

    watch: {
        search(query) {
            this.paginator.data = this.usuarios.filter(user => {
                return new RegExp(query, 'ig')
                    .test(`${user.name} ${user.email} ${user.role}`)
            })
        }
    }




});