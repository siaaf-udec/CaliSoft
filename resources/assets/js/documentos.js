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
            tiposDocumentos: [],
            proyectoId: window.proyectoId
            },


    created(){
        
        axios.get(`../api/Documentacion/${this.proyectoId}`)
            .then(res => this.documentos = res.data);

        axios.get(`/api/tdocumentos`)
            .then(res => this.tiposDocumentos = res.data);

    },

    methods:{


        openEditModal(documentos) {
            this.fillDocumentos = Object.assign({}, documentos);
            $('#editar-documentos').modal("show");
        },

        store(idfk){
            this.newDocumentos.FK_ProyectoId = idfk;
            axios.post('../api/documentacion/',this.newDocumentos)
            .then(res => this.documentos.push(res.data))
        }


        }
});
