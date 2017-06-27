import "./bootstrap";
import Vue from "vue";
import Modal from "../components/Modal";

new Vue({
    el: '#app',
    components: { Modal },
    data: {
        newUser: {},
        usuarios: [],
        errors: {},
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
        destroy(user) {
            axios.delete('/api/usuarios/' + user.PK_id)
                .then(() => {
                    this.usuarios = this.usuarios.filter(value => value != user);
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
