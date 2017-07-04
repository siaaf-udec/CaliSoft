import "./bootstrap";
import Vue from "vue";
import Modal from "../components/Modal";
import BsSelect from "../components/bs-select"

new Vue({
    el: '#app',
    components: { Modal, BsSelect },
    data: {
        newUser: {},
        usuarios: [],
        errors: {},
        deleteUser: {},
        paginacion:{},
        role: ""
    },
    created() {
        this.refresh('/api/usuarios');
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
        openDeleteModal(user){
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
        refresh(url, params){
          if(!url) return;
          axios.get(url, { params }).then(response => {
              this.paginacion = response.data;
              this.usuarios = this.paginacion.data;
          });
        },
    },

    watch: {
        role(val) {
            let params = { page: this.paginacion.current_page };
            if(val) params.role = val;
            this.refresh('/api/usuarios', params);
        }
    }


});
