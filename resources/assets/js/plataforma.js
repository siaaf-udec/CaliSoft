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
        destroy(caso) {
            axios.delete('/api/casoPrueba/' + caso.PK_id).then(() => {
                this.casoPrueba = this.casoPrueba.filter(value => value != caso);
                toastr.info('Caso prueba eliminado correctamente');
            });
        },
    }
})