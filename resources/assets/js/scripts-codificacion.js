import "./bootstrap";
import Vue from "vue";
import { Modal } from "uiv";

new Vue({
    el: "#app",
    components: { Modal },
    data: {
        script: [],
        newDocumentos: {},
        fillDocumentos: {},
        formErrors: {},
        formErrorsUpdate: {},
        modalState: false,
    },
    created() {
        this.refresh();
    },
    methods: {
        refresh() {
            axios.get('/api/documentacion-scripts')
                .then(response => this.script = response.data);
        }
    }

});