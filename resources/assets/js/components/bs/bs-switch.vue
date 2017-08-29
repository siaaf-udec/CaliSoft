<template>
    <input type="checkbox" :id="id" :data-label-text="label || id" :required="required" data-size="normal" data-inverse="true" :checked="value">
</template>

<script>
export default {
    props: ['id', 'value', 'label', 'required', 'options'],
    mounted() {
        let el = $("#" + this.id);
        el.bootstrapSwitch(this.options);
        el.on('switchChange.bootstrapSwitch', this.handleChange);
    },
    methods: {
        handleChange(e, state) {
            this.$emit('input', state)
            this.$emit('change', state)
        }
    }
}
</script>
