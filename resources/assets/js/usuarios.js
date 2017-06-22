import "./bootstrap";
import Vue from "vue";

new Vue({
    el: '#app',
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
                    $("#crear-evaluador").modal("hide");
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
        refresh(url){
          if(!url) return;
          axios.get(url).then(response => {
              this.paginacion = response.data;
              this.usuarios = this.paginacion.data;
          });
        }
    },

    computed: {
        searchedUsers(){
            if(!this.role) return this.usuarios;
            return this.usuarios.filter(usuario => usuario.role == this.role);
        }
    }


});
