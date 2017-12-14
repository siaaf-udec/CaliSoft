<template>

    <input class="form-control" type="date" :name="id" 
        :id="id" :maxlength="input.maxlength" :required="input.required" :min="input.min" :max="input.max" :pattern="input.pattern" v-model="local">
    </input>
                    
</template>

<script>
export default {
    name: 't-date',
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
