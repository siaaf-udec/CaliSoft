<template>
    <div class="form-group form-md-line-input">
        <div class="input-icon">
            <select :name="name" :id="name" class="form-control" :required="required" v-model="local">
                <slot></slot>
            </select>
            <label :for="name" class="control-label">{{ label }}</label>
            <i :class="icon"></i>
        </div>
    </div>
</template>

<script>
export default {
    props: ['value', 'name', 'required', 'icon', 'label'],
    data() {
        return { local: this.value }
    },
    watch: {
        local(value) {
            this.$emit('input', this.local);
        },
        value(val) {
            this.local = val
        }
    }
}
</script>
