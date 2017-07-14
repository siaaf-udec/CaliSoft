import "./bootstrap";
import Vue from "vue";
import Modal from "../components/modal";
new Vue({
    el: "#app",
    components: {
        Modal
    },
    data() {
        return {
            peticiones: [],
            fillPeticiones: {},
            formErrors: {},
            formErrorsUpdate: {}
        }
    },
    created() {
        axios.get(`/api/peticiones`).then(res => this.peticiones = res.data);
        //  axios.get('/api/proyectos')
        //    .then(res => this.peticiones = res.data);
    },
    methods: {
        asig(peticion) {
            this.fillPeticiones = Object.assign({}, peticion);
            this.fillPeticiones.state = "activo";
            $('#editar-proyecto').modal("show");
        },
        //actualiza el proyecto
        update() {
            axios.put('/api/peticiones/' + this.fillPeticiones.PK_id, this.fillPeticiones).then(response => {
                this.peticiones = this.peticiones.map(value => {
                    return value.PK_id == this.fillPeticiones.PK_id ? this.fillPeticiones : value;
                });
                this.fillPeticiones = {};
                toastr.info('Proyecto aprobado correctamente');
            }).catch(error => this.formErrorsUpdate = error.response.data);
            $('#editar-proyecto').modal("hide");
        },
    }
});