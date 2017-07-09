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


    },

    methods:{


        openEditModal(documentos) {
            this.fillDocumentos = Object.assign({}, documentos);
            $('#editar-documentos').modal("show");
        },

    
        update() {
            axios.put('../api/documentacion/' + this.fillDocumentos.PK_id, this.fillDocumentos)
                .then(response => {
                    this.documentos = this.documentos.map(value => {
                        return value.PK_id == this.fillDocumentos.PK_id ? this.fillDocumentos : value;
                    });
                    this.fillDocumentos = {};
                    $("#editar-documentos").modal("hide");
                    toastr.info('Documento editado correctamente');
                })
                .catch(error => this.formErrorsUpdate = error.response.data);
        },

        destroy(documento) {
            axios.delete('../api/documentacion/' + documento.PK_id)
                .then(() => {
                    this.documentos = this.documentos.filter(value => value != documento);

                    toastr.info('Documento eliminado correctamente');
                });

        },


        }
});
