import "./bootstrap";
import Vue from "vue";
import { Modal } from "uiv";
import BsSelect from "./components/bs/bs-select";

new Vue({
    el:"#app",
    components: { Modal, BsSelect },
    data:{
        archivosql: [],

        //tipobd: [],

        modalState: false,
        deleteModalState: false,
        eliminarSql: {},
    },
    created(){
        this.refresh();
    },
    methods:{
        refresh(){
            axios.get('/api/documentacion-sql/')
            .then(response => this.archivosql = response.data);
        },
        destroy(archivosql){
            axios.delete('/api/documentacion-sql/' + archivosql.PK_id)
            .then(()=>{
                this.archivosql = this.archivosql.filter(value => value != archivosql);
                this.deleteModalState = false;
                toastr.success('Documento Eliminado Correctamente');
            });
        },
        openDeleteModal(archivosql) {
            this.eliminarSql = archivosql;
            this.deleteModalState = true;
        },
        closeDeleteModal() {
            this.deleteModalState = false;
        },
    },
});