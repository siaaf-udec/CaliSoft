<template>
  <div>
    <div class="table-responsive">
            <table class="table table-hover table-bordered table-condensed">
                <thead>
                    <th class="text-center">Items</th>
                    <th class="text-center">Calificación</th>
                </thead>
                <tbody>
                    <tr v-for="itemCod in items" class="text-center">
                        <td v-text="itemCod.item"></td>
                        <td>
                        
                        <input type="number"  class="form-control" :value="itemCod.pivot.nota"  
                            min="0" max="5" required="required" 
                            @change="update(itemCod,$event.target.value)" />
                        
                    </td>
                    </tr>
                </tbody>
            </table>
    </div>
             
    </div>
</template>
<script>
import TextareaInput from '../inputs/textarea-input';
import TextInput from '../inputs/text-input'
export default {
    components:{ TextareaInput, TextInput},
    props:['items'],
    methods:{
        update(item,nota){
            axios.put('/api/evaluacionesScript/' + window.ScriptId,{
                itemId:item.PK_id,
                nota:nota,
            }).then(response=>{
                    
            })
        }
    }
}
</script>

