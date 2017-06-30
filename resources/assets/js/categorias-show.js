import "./bootstrap";
import Vue from "vue";
import Modal from "../components/Modal";
import CategoryList from "../components/category-list";

let vm = new Vue({
    el: '#app',
    components: { Modal, CategoryList },
    data: {
        categorias: [],

    },
    created() {
        axios.get('/api/categorias')
            .then(response => {
                this.categorias = response.data;
            });
    },
});