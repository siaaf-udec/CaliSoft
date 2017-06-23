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
        openEditModal(componentes) {
            this.fillCategoria = Object.assign({}, componentes);
            $('#editar-componentes').modal("show");
        },

        store(){
            this.newComponente.FK_TipoDocumentoId = this.documentoId;
            axios.post('/api/componentes/',this.newComponente)
            .then(res => this.componentes.push(res.data))
        },

        destroy(componentes) {
            axios.delete('/api/componentes/' + componentes.PK_id)
                .then(() => {
                    this.componentes = this.componentes.filter(value => value != componentes);
                    
                    toastr.info('Componente eliminado correctamente');
                });

        }


        }
});
