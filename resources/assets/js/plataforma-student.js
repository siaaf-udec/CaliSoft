import './bootstrap';
import Vue from 'vue';
import axios from 'axios';
import TextInput from "./components/inputs/text-input";
import Modal from "./components/utils/modal";
import BsSwitch from './components/bs/bs-switch';
import SelectInput from "./components/inputs/select-input";
import TextareaInput from "./components/inputs/textarea-input";

new Vue({
    el: '#app',
    components: {
        Modal,
        BsSwitch, 
        TextInput,
        TextareaInput, 
        SelectInput 
    },
    data() {
        return {
            casoPrueba: [],
            newCasoPrueba: {},
            fillCasoPrueba: {},
            formErrors: {},
            formErrorsUpdate: {},
            proyectoId: window.proyectoId,
            modalState: false,
            selected: {}
        }
    },
    created() {
        axios.get(`/api/proyectos/${window.proyectoId}/plataforma`)
                .then(res => this.casoPrueba = res.data);
                
    },
    methods: {
        openCreateModal(caso) {
            this.fillCasoPrueba = caso;
            $('#crear-categoria').modal("show");
        },
        store() {
            this.newCasoPrueba.FK_ProyectoId = this.proyectoId;
            axios.post('/api/casoPrueba', this.newCasoPrueba)
                .then(response => {
                    this.casoPrueba.push(response.data);
                    this.formErrors = {};
                    this.newCasoPrueba = {};
                    $("#crear-caso").modal("hide");
                    toastr.success('Caso Prueba Creado Correctamente');
                })
                .catch(error => this.formErrors = error.response.data);
        },
        update(caso) {
            axios.post('/api/enviarCasoPrueba/' + caso.PK_id, caso)
                .then(response => {
                    this.casoPrueba = this.casoPrueba.map(value => {
                        return value.PK_id == caso.PK_id ? caso : value;
                    });                   
                    toastr.info('Caso prueba subido correctamente');
                })
                .catch(error => this.formErrorsUpdate = error.response.data);
        }
    }
});

Dropzone.options.myAwesomeDropzone = {
    
    uploadMultiple: false,
    maxFilezise: 1000,
    acceptedFiles: '.pdf',
    success: function (a, doc) {
        vm.$data.documentos.push(doc);
        toastr.info('Documento subido correctamente');
        return a.previewElement ? a.previewElement.classList.add("dz-success") : void 0
    },
    error(file, message, xhr) {
        this.removeFile(file);
        toastr.error('El tipo de documento es obligatorio');
    }
};