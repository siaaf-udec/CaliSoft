import "./bootstrap";
import Vue from "vue";


new Vue({
    el: "#app",
    data: { 

            documentos: [],
            newDocumentos: {},
            fillDocumentos: {},
            formErrors: {},
            formErrorsUpdate: {},
            tiposDocumentos: []

            },

    created(){
        
        axios.get(`/api/documentacion/`)
            .then(res => this.documentos = res.data);

    },

    methods:{
        openEditModal(documentos) {
            this.fillDocumentos = Object.assign({}, documentos);
            $('#editar-documentos').modal("show");
        },

        store(){
            this.newDocumentos.FK_TipoDocumentoId = this.documentoId;
            axios.post('api/documentacion/',this.newComponente)
            .then(res => this.documentos.push(res.data))
        }



        }
});
