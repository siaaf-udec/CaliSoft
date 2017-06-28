import "./bootstrap";
import Vue from "vue";


new Vue({
    el: "#app",
    data: { 
            proyectoId: {},
            documentos: [],
            newDocumentos: {},
            fillDocumentos: {},
            formErrors: {},
            formErrorsUpdate: {},
            tiposDocumentos: []
            },

    created(){
        
       // axios.get(`/api/tdocumentos/${this.documentoId}/componentes`)
         //   .then(res => this.componentes = res.data);

        axios.get(`/api/documentos`)
            .then(res => this.tiposDocumentos = res.data);

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
