import "./bootstrap";
import Vue from "vue";

new Vue(
  {
    el:'#app',
    data:{
      newUser:{},
      usuarios:[],
    },
    created(){
      axios.get('/api/usuarios').then(response=>{
        this.usuarios=response.data;
      });
    },
    methods:{
      store(){
        axios.post('/api/usuarios',this.newUser).then(response=>{
          this.usuarios.push(response.data);
          this.newUser = {};
          $("#crear-evaluador").modal("hide");
        });
      }
    }


  });
