<template>

    <input class="form-control" type="number" :name="id" 
        :id="id" :maxlength="input.maxlength" :required="input.required" :pattern="input.pattern" :step="input.step" :min="input.min" :max="input.max" v-model="local">
    </input>
                    
</template>

<script>
export default {
    name: 't-number',
    props:['input','value'],
    data(){
        return { local: ""}
    },
    computed:{
        id(){
            return this.input.id || this.input.name
        }
    },
    watch:{
        local(val){
            this.$emit('input',val)
        }        
    }
}

</script>
