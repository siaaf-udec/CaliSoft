import './bootstrap';
import Vue from 'vue';
import axios from 'axios';
import TextInput from "./components/inputs/text-input";
import { Modal } from "uiv";
import BsSwitch from './components/bs/bs-switch';
import SelectInput from "./components/inputs/select-input";
import TextareaInput from "./components/inputs/textarea-input";
import { Popover } from "uiv";
import VeeValidate from 'vee-validate';
import inputList from './components/testInputs/inputList'; 

Vue.use(VeeValidate);
new Vue({
    el: '#app',
    components: {
        Modal,
        BsSwitch, 
        TextInput,
        TextareaInput, 
        SelectInput,
        Popover, 
        inputList
    },
    data() {
        return {
            
            json: [],
            tiposInputs: [],
            test: {},
            prueba: {},
            formErrors: {},
            formErrorsUpdate: {},
            casoPruebaId: window.casoPruebaId,
        }
    },

    created() {        
        let promesaFormulario = axios.get(`/api/casoPrueba/${window.casoPruebaId}`);
        let promesaTipoInputs = axios.get(`/api/tiposInputs`);
        axios.all([promesaFormulario, promesaTipoInputs])
        .then(axios.spread((json,tiposInputs) => {
            this.json = json.data;
            this.tiposInputs = tiposInputs.data;
        } )) ;

    },
    methods: {
        store(){
            //prueba[text] = test[1];
            console.log(this.test[3]);
           
            for (var i=0; i<this.json.length; i++) {
                    
                    this.prueba[i] = this.test[this.json[i]['testInput']];
                    console.log(this.json[i]['type']);
                
            }
            console.log(this.prueba);
            axios.post('/api/testing', this.test)
                .then(response => {
                    this.test.push(response.data);
                    this.formErrors = {};
                    this.test = {};
                    toastr.success('primera prueba');
                })
                .catch(error => this.formErrors = error.response.data);
        }
        
    }
});

