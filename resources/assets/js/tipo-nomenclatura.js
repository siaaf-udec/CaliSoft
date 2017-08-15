import "./bootstrap";
import Vue from "vue";
import Modal from "./components/utils/modal";
import TextInput from "./components/inputs/text-input";
import NumberInput from "./components/inputs/number-input";

new Vue({
    el: '#app',
    components: {Modal, TextInput, NumberInput},
    data(){
        return{
          componentes: [],
          errorsUpdate: {},
          fillNomenclatura: {},
        }
    },
    created(){
      axios.get('/api/basedatos')
        .then(response => {
          this.componentes = response.data;
        });
      }
});
