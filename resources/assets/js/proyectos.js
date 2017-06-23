import "./bootstrap";
import Vue from "vue";

new Vue({
    el: '#app',
    data : { categorias : [], 
             semilleros: [], 
             grupos: [] ,
             proyecto: {},
             errors : [],
             mensajes :{
                  categoria: 'Debe Seleccionar Una Categoria',
                  grupo: 'Debe seleccionar Un Grupo de Investigacion',
                  semillero: 'Debe seleccionar Un Semillero'  
             } 
     },
    created(){
        axios.all([
            axios.get('/api/proyectos/categorias'),
            axios.get('/api/proyectos/semilleros'),
            axios.get('/api/proyectos/grupos')
            ])
            .then(axios.spread((cat,sem,gru) => {
                this.categorias = cat.data;
                this.semilleros = sem.data;
                this.grupos = gru.data;
            })).catch(e => {
                this.error = e.message;
            });
    },
    methods:{
             store(){
                 axios.post('/api/proyectos/',this.proyecto).then(
                     res => {
                           console.log(res.data); 
                     }
                 ).catch(e => {
                       this.errors = e.response.data;
                 });
             },
    }       
});