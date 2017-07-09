import "./bootstrap";
import Vue from "vue";


new Vue({
    el: "#app",
    data() {
        return {
            peticiones: [],
            fillComponente: {},
            formErrors: {},
            formErrorsUpdate: {}
        }
    },

    created(){
        axios.get(`/api/peticiones`)
            .then(res => this.peticiones = res.data);
    },

    methods:{


        //actualiza el componente
        update() {
            axios.put('/api/componentes/' + this.fillComponente.PK_id, this.fillComponente)
                .then(response => {
                    this.componentes = this.componentes.map(value => {
                        return value.PK_id == this.fillComponente.PK_id ? this.fillComponente : value;
                    });
                    this.fillComponente = {};
                    $("#editar-componentes").modal("hide");
                    toastr.info('Componente editado correctamente');
                })
                .catch(error => this.formErrorsUpdate = error.response.data);
        },

        //elimina el componente
        destroy(componentes) {
            axios.delete('/api/componentes/' + componentes.PK_id)
                .then(() => {
                    this.componentes = this.componentes.filter(value => value != componentes);
                    toastr.info('Componente eliminado correctamente');
                });
        },


    }
});
