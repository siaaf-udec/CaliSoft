<template>
  <div>
    <div class="table-responsive">
            <table class="table table-hover table-bordered table-condensed">
                <thead>
                    <th class="text-center">Items</th>
                    <th class="text-center">Total Del Item</th>
                    <th class="text-center">Aprobados Del Item</th>
                    <th class="text-center">Calificación</th>
                </thead>
                <tbody>
                    <tr is="fila-item" v-for="item in items" :item="item">

                    </tr>
                </tbody>
            </table>
    </div>
             
    </div>
</template>
<script>
import TextareaInput from '../inputs/textarea-input';
import TextInput from '../inputs/text-input';
import filaItem from './fila-item';
export default {
    components:{ TextareaInput, TextInput,filaItem},
    props:['items'],
    methods:{
        update(item){
            axios.put('/api/evaluacionesScript/' + window.ScriptId,{
                PK_id: item.PK_id, nota:item.pivot.nota, acertadas:item.pivot.acertadas,
                total:item.pivot.total,
            }).then(response=>{
                    
            })
        },
        validacion(item){
            
            
            if(item.pivot.total>0){
                item.pivot.nota=item.pivot.acertadas/item.pivot.total
                
            }
            else
            {
                item.pivot.nota=0
            }
            this.update(item)
            return item.pivot.nota

        },
    }
}
</script>

