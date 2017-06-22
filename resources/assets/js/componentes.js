import "./bootstrap";
import Vue from "vue";


new Vue({
    el: "#app",
    data: { componentes: [], documento: window.documentId },
    created(){
        axios.get(`/api/tdocumentos/${this.documento}/componentes`)
            .then(res => this.componentes = res.data);
    }
})
