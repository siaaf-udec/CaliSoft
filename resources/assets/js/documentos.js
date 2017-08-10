import "./bootstrap";
import Vue from "vue";
import {  Modal } from "uiv";
import BsSelect from "./components/bs/bs-select";


new Vue({
    el: "#app",
    components: {
        Modal,
        BsSelect
    },
    props: ['src'],
    data: {
        documentos: [],
        newDocumentos: {},
        fillDocumentos: {},
        formErrors: {},
        formErrorsUpdate: {},
        tiposDocumentos: [],
        paginacion: {},
        proyectoId: window.proyectId,
        tipo: "",
        modalState: false 
    },
    created() {
        this.refresh('/api/documentacion');
        axios.get(`/api/tdocumentos`).then(res => this.tiposDocumentos = res.data);
        //axios.get(`/api/documentacion`).then(res => this.documentos = res.data);
    },
    methods: {
        show() {
            $('#subir-documentos').modal("show");
        },
        openEditModal(documento) {
            this.fillDocumentos = Object.assign({}, documento);
            $('#editar-documentos').modal("show");
        },
        update() {
            axios.put('/api/documentacion/' + this.fillDocumentos.PK_id, this.fillDocumentos).then(response => {
                this.documentos = this.documentos.map(value => {
                    return value.PK_id == this.fillDocumentos.PK_id ? this.fillDocumentos : value;
                });
                this.fillDocumentos = {};
                $("#editar-documentos").modal("hide");
                toastr.info('Documento editado correctamente');
            }).catch(error => this.formErrorsUpdate = error.response.data);
        },
        destroy(documento) {
            axios.delete('/api/documentacion/' + documento.PK_id).then(() => {
                this.documentos = this.documentos.filter(value => value != documento);
                toastr.info('Documento eliminado correctamente');
            });
        },
        refresh(url, params) {
            if (!url) return;
            axios.get(url, {
                params
            }).then(response => {
                this.paginacion = response.data;
                this.documentos = this.paginacion.data;
            });
        },
        watch: {
           
            tipo(val) {
                let params = {
                    page: this.paginacion.current_page
                };
                if (val) params.tipo = val;
                this.refresh('/api/documentacion', params);
            }
        }
    }
});