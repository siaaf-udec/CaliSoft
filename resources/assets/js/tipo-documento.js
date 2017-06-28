import "./bootstrap";
import Vue from "vue";

new Vue({
    el: '#app',
    data: {
        tdocumentos: []
    },
    created(){
        axios.get('/api/tdocumentos').then(res => {
            this.tdocumentos = res.data
        });
    },

    updated(){
        $("[type='checkbox']").bootstrapSwitch();
    }
})
