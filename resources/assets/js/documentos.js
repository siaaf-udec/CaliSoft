import "./bootstrap";
import Vue from "vue";
import { Modal } from "uiv";
import BsSelect from "./components/bs/bs-select";
import DocumentList from "./components/documentacion/document-list";
import DocumentProgress from "./components/documentacion/document-progress";

new Vue({
    el: "#app",
    components: { Modal, BsSelect, DocumentList, DocumentProgress },
    props: ['src'],
    data: {
        documentos: [],
        tiposDocumentos: [],

        newDocumentos: {},
        fillDocumentos: {},
        formErrors: {},
        formErrorsUpdate: {},

        modalState: false,
        editModalState: false
    },
    created() {
        this.refresh();
        axios.get(`/api/tdocumentos`).then(res => this.tiposDocumentos = res.data);
    },
    methods: {
        openEditModal(documento) {
            this.fillDocumentos = Object.assign({}, documento);
            this.editModalState = true;
        },
        update() {
            axios.put('/api/documentacion/' + this.fillDocumentos.PK_id, this.fillDocumentos)
                .then(response => {
                    this.documentos = this.documentos.map(value => {
                        return value.PK_id == this.fillDocumentos.PK_id ? this.fillDocumentos : value;
                    });
                    this.fillDocumentos = {};
                    this.editModalState = false;
                    toastr.info('Documento editado correctamente');
                    this.refresh();
                }).catch(error => this.formErrorsUpdate = error.response.data);
        },
        destroy(documento) {
            axios.delete('/api/documentacion/' + documento.PK_id).then(() => {
                this.documentos = this.documentos.filter(value => value != documento);
                toastr.info('Documento eliminado correctamente');
            });
        },
        refresh() {
            axios.get('/api/documentacion')
                .then(response => this.documentos = response.data);
        }
    }
});