import "./bootstrap";
import Vue from "vue";

new Vue({
    el: '#app',
    data: {
        categorias: [],
        offset: 4,
        formErrors: {},
        formErrorsUpdate: {},
        crearCategoria: {
            'nombre': '',
            'plataforma': '',
            'modelado': '',
            'despliegue': '',
            'entidad_relacion': '',
            'clases': '',
            'actividades': '',
            'secuencia': '',
            'uso': ''
        },
        fillCategoria: {
            'PK_id': '',
            'nombre': '',
            'plataforma': '',
            'modelado': '',
            'despliegue': '',
            'entidad_relacion': '',
            'clases': '',
            'actividades': '',
            'secuencia': '',
            'uso': ''
        }
    },
    created() {
        axios.get('/api/categorias')
            .then(response => {
                this.categorias = response.data;
            });
    },
    ready: function() {
        this.getValueCategorias: function(page) {

        }
    }


});