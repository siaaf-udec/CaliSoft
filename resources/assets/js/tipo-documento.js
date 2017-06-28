import "./bootstrap";
import Vue from "vue";
import BsSwitch from "../components/bs-switch";
import Modal from "../components/Modal";

new Vue({
    el: '#app',
    components: { BsSwitch, Modal },
    data: {
        tdocumentos: [],
        tdocForm: {},
        tdocEdit: {},
        tdocDel: {}
    },
    created(){
        axios.get('/api/tdocumentos').then(res => {
            this.tdocumentos = res.data
        });
    },

    methods: {

        //crear tipo de documento
        store(){

        },

        //editar tipo de documento
        update(){

        },

        //eliminar tipo de documento
        destroy(){
            
        },

        //seleciona el tipo de documento a editar
        selectEdit(tdoc){
            this.tdocEdit = Object.assign({}, tdoc);
        },

        //seleciona el tipo de documento a eliminar
        selectDelete(tdoc){
            this.tdocDel = tdoc;
            $("#destroy-tdoc").modal('show');
        }
    }
})
