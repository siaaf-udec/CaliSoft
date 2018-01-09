<template>
   
        <tr class="text-center">
            <td v-text="item.item"></td>
            <td>        
                <input type="text"  class="form-control" v-model="item.pivot.total"required="required" />
            </td>
            <td>        
                <input type="text"  class="form-control" v-model="item.pivot.acertadas" required="required" />
            </td>
            <td >
                {{item.pivot.nota}}        
            </td>
        </tr>
    
</template>
<script>
    export default {
        props: {
            item:{type:Object,required:true}
        },
    methods:{
        update(item){
            axios.put('/api/evaluacionesScript/' + window.ScriptId,{
                PK_id: item.PK_id, nota:item.pivot.nota, acertadas:item.pivot.acertadas,
                total:item.pivot.total,
            }).then(response=>{
                    
            })
        },
        validacion(total,acertadas){
            
            if(total>0){
                this.item.pivot.nota=acertadas/total
                
            }
            else
            {
                this.item.pivot.nota=0
            }
            this.update(this.item)

        },
    },
       
    watch:{
        "item.pivot.total":function(total){
            this.validacion(total,this.item.pivot.acertadas)
        },
         "item.pivot.acertadas":function(acertadas){
            this.validacion(this.item.pivot.total,acertadas)
         },
    },
}

</script>