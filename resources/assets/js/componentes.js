import "./bootstrap";
import Vue from "vue";


new Vue({
    el: "#app",
    data: { 

            componentes: [],
            documentoId: window.documentId,
            newComponente: {}

            },

    created(){
        
        axios.get(`/api/tdocumentos/${this.documentoId}/componentes`)
            .then(res => this.componentes = res.data);
    },

    methods:{
        store(){
            this.newComponente.FK_TipoDocumentoId = this.documentoId;
            axios.post('/api/componentes/',this.newComponente)
            .then(res => this.componentes.push(res.data))
        }
    }
})
