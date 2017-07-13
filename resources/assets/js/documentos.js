import "./bootstrap";
import Vue from "vue";
import Modal from "../components/modal";
new Vue({
    el: "#app",
    components: {
        Modal
    },
    props: ['src'],
    data: {
        documentos: [],
        newDocumentos: {},
        fillDocumentos: {},
        formErrors: {},
        formErrorsUpdate: {},
        tiposDocumentos: [],
        proyectoId: window.proyectId
    },
    created() {
        axios.get(`/api/tdocumentos`).then(res => this.tiposDocumentos = res.data);
        axios.get(`/api/documentacion`).then(res => this.documentos = res.data);
    },
    methods: {
        show() {
            $('#subir-documentos').modal("show");
        },
        openEditModal(documento) {
            this.fillDocumentos = Object.assign({}, documento);
            $('#editar-documentos').modal("show");
        },
        store() {
            this.newDocumentos.FK_ProyectoId = this.proyectoId;
            axios.post('/api/documentacion/', this.newDocumentos).then(res => {
                this.documentos.push(res.data);
                this.newDocumentos = this.getSchema();
                $('#subir-documentos').modal("hide");
                toastr.info('Documento subido correctamente');
            }).catch(err => this.formErrors = err.response.data)
            $('#subir-documentos').modal("hide");
        },
        update() {
            axios.put('../api/documentacion/' + this.fillDocumentos.PK_id, this.fillDocumentos).then(response => {
                this.documentos = this.documentos.map(value => {
                    return value.PK_id == this.fillDocumentos.PK_id ? this.fillDocumentos : value;
                });
                this.fillDocumentos = {};
                $("#editar-documentos").modal("hide");
                toastr.info('Documento editado correctamente');
            }).catch(error => this.formErrorsUpdate = error.response.data);
        },
        destroy(documento) {
            axios.delete('../api/documentacion/' + documento.PK_id).then(() => {
                this.documentos = this.documentos.filter(value => value != documento);
                toastr.info('Documento eliminado correctamente');
            });
        },
        fileChange(e) {
            let file = e.target.files[0];
            if (file && file.type.match('pdf')) {
                this.renderPreview(file);
                this.$emit('change', file); //emite el archivo hacia el parent
            };
        },
        renderPreview(file) {
            let reader = new FileReader();
            reader.addEventListener('loadend', () => this.image = reader.result);
            reader.readAsDataURL(file);
        },
    },
    computed: {
        preview() {
            return this.image || this.src
        }
    }
});