<template>

    <input class="form-control" type="range" :name="id" 
        :id="id" :maxlength="input.maxlength" :required="input.required" :pattern="input.pattern" :min="input.min" :max="input.max" v-model="local">
    </input>
                    
</template>

<script>
export default {
    name: 't-range',
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
