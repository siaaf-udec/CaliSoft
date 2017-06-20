import "./bootstrap";
import Vue from "vue";

new Vue({
    el: '#app',
    data: { categorias: [] },
    created() {
        axios.get('/api/categorias')
            .then(response => {
                this.categorias = response.data;
            });
    }
});
