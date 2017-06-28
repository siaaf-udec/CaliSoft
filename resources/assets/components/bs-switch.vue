<template>
    <input type="checkbox" :id="id" :data-label-text="label || id"
        data-size="normal" data-inverse="true" :checked="value">
</template>

<script>
export default {
    props: ['id', 'value', 'label'],
    mounted(){
        let el = $("#" + this.id);
        el.bootstrapSwitch();
        el.on('switchChange.bootstrapSwitch', this.handleChange);
    },
    methods: {
        handleChange(e, state){
            this.$emit('input', state)
        }
    }
}
</script>
