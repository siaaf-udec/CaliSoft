<template>
    <input type="checkbox" :id="id" :data-label-text="label || id" :required="required"
        data-size="normal" data-inverse="true" :checked="value" :data-off-color="off">
</template>

<script>
export default {
    props: ['id', 'value', 'label', 'required', 'on', 'off'],
    mounted(){ 
        let el = $("#" + this.id);
        el.bootstrapSwitch({
            on: this.on,
            off: this.off
        });
        el.on('switchChange.bootstrapSwitch', this.handleChange);
    },
    methods: {
        handleChange(e, state){
            this.$emit('input', state)
        }
    }
}
</script>
