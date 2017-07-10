import "./bootstrap";
import Vue from "vue";
import proyectoTabla from "../components/proyecto-tabla";

let vm = new Vue({
    el: '#app',
    components: { proyectoTabla },
    data: {
            proyectos: [],
            seleccion: {},
            paginacion:{}
          },

    created() {
        //axios.get('/api/proyectos').then(res => this.proyectos = res.data);
        this.refresh('/api/proyectos');
    },

    methods: {
        seleccionar(proyecto) {
            this.seleccion = proyecto;
        },
        refresh(url,params){
          //axios.get('/api/proyectos').then(res => this.proyectos = res.data);
          if(!url) return;
          axios.get(url, { params }).then(response => {
              this.paginacion = response.data;
              this.proyectos = this.paginacion.data;
          });
        }
    },
});
