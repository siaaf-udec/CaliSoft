<template>

    <input class="form-control" type="tel" :name="id" 
        :id="id" :maxlength="input.maxlength" :required="input.required" :pattern="input.pattern" v-model="local">
    </input>
                    
</template>

<script>
export default {
    name: 't-tel',
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
