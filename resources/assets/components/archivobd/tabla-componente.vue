<template>
  <div>
    <div class="table-responsive">
            <table class="table table-hover table-bordered table-condensed">
                <thead>
                    <th class="text-center">Componente</th>
                    <th class="text-center">Totales</th>
                    <th class="text-center">Aprobados</th>
                    <th class="text-center">Calificación</th>
                </thead>
                <tbody>
                    <tr is="fila-componente" v-for="componente in componentes" :item="componente" :key="componente.PK_id" >

                    </tr>
                </tbody>
            </table>
    </div>
             
    </div>
</template>
<script>
import TextareaInput from '../inputs/textarea-input';
import filaComponente from './fila-componente';
import _ from 'lodash';
    export default{
        components:{ TextareaInput,filaComponente},
        data(){
            return {
                componentes:[]
            }
        },
        created(){
            axios.get(`/api/evaluacionSql/${window.archivoId}`)
                .then(response => this.componentes = response.data);
        },
        computed:{
            notaFinal(){
                return _(this.componentes) 
                    .filter(componente => componente.pivot.total > 0) //escoge los valores donde el total sea mayor a cero
                    .meanBy(componente => {
                            let nota = Number.parseFloat(componente.pivot.calificacion)
                            console.log(nota)
                            return nota
                            })//calcula el promedio

                    
                    .value() //obtiene el promedio
            }
        }
    }
</script>