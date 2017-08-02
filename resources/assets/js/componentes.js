import "./bootstrap";
import Vue from "vue";
import BsSwitch from "./components/bs/bs-switch";
import Modal from "./components/utils/modal";

new Vue({
    el: "#app",
    components: { BsSwitch, Modal },
    data() {
        return {
            componentes: [],
            newComponente: this.getSchema(),
            documentoId: window.documentId,
            fillComponente: {},
            formErrors: {},
            formErrorsUpdate: {},
            tiposDocumentos: []
        }
    },

    created(){
        axios.get(`/api/tdocumentos/${this.documentoId}/componentes`)
            .then(res => this.componentes = res.data);
    },

    methods:{

        //abre el modal de edicion
        openEditModal(componentes) {
            this.fillComponente = Object.assign({}, componentes);
            $('#editar-componentes').modal("show");
        },

        //crea el componente del documento
        store(){
            this.newComponente.FK_TipoDocumentoId = this.documentoId;
            axios.post('/api/componentes/', this.newComponente)
                .then(res => {
                    this.componentes.push(res.data);
                    this.newComponente = this.getSchema();
                    $("#crear-componente").modal("hide");
                    toastr.info('Componente subido correctamente');
                })
                .catch(err => this.formErrors = err.response.data);
        },

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

        //esquema de un componente de documento
        getSchema(){
            return {
                nombre: "",
                required: false,
                descripcion:"",
            }
        },



    }
});
