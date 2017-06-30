import "./bootstrap";
import Vue from "vue";
import BsSwitch from "../components/bs-switch";


new Vue({
    el: "#app",
    components: { BsSwitch},
    data: { 

            componentes: [],
            documentoId: window.documentId,
            newComponente: {},
            fillComponente: {},
            formErrors: {},
            formErrorsUpdate: {},
            tiposDocumentos: []
            },

    created(){
        
        axios.get(`/api/tdocumentos/${this.documentoId}/componentes`)
            .then(res => this.componentes = res.data);

        axios.get(`/api/tdocumentos`)
            .then(res => this.tiposDocumentos = res.data);
    },

    

    methods:{
        openEditModal(componentes) {
            this.fillComponente = Object.assign({}, componentes);
            $('#editar-componentes').modal("show");
        },

        store(){
            this.newComponente.FK_TipoDocumentoId = this.documentoId;
            axios.post('/api/componentes/',this.newComponente)
            .then(res => this.componentes.push(res.data));
            $("#crear-componente").modal("hide");;
            toastr.info('Componente subido correctamente');
        },

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

        destroy(componentes) {
            axios.delete('/api/componentes/' + componentes.PK_id)
                .then(() => {
                    this.componentes = this.componentes.filter(value => value != componentes);

                    toastr.info('Componente eliminado correctamente');
                });

        },

        getSchema(){
            return { nombre: "",required: false, descripcion:"", FK_TipoDocumentoId: "" }
        },



        }
});
