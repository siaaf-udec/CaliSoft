import "./bootstrap";
import Vue from "vue";

new Vue({
    el: '#app',
    data : { categorias : [], 
             semilleros: [], 
             grupos: [] ,
             proyecto: {},
             error : " " },
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
                 ).catch(e => console.log(e));
             },
    }       
});