import "./bootstrap";
import Vue from "vue";
import { Modal } from "uiv";
import Paginator from './components/classes/paginator';
import { Pagination } from "uiv";

new Vue({
    el: "#app",
    components: { Modal, Pagination },
    data: {
        script: [],
        newDocumentos: {},
        formErrors: {},
        formErrorsUpdate: {},
        modalState: false,
        paginator: new Paginator(),
        deleteModalState: false,
        elimiScript: {},

    },
    created() {
        this.refresh();
    },
    methods: {
        refresh() {
            axios.get('/api/documentacion-scripts/')
                .then(response => this.script = response.data);
        },
        destroy(script) {
            axios.delete('/api/documentacion-scripts/' + script.PK_id)
                .then(() => {
                    this.script = this.script.filter(value => value != script);
                    this.deleteModalState = false;
                    toastr.warning('Documento Eliminado Correctamente');
                });
        },
        openDeleteModal(script) {
            this.elimiScript = script;
            this.deleteModalState = true;

        },
        closeDeleteModal() {
            this.deleteModalState = false;
        }
    },


});