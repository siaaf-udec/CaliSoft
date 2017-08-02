<template>
    <div class="form-group form-md-line-input" :class="{'has-error':error}">
        <div class="input-icon">
            <input type="text" :name="name" class="form-control" v-model="local" :required="required" />
            <label :for="name" class="control-label">{{label}}</label>
            <span v-if="error" class=" help-block">
                <strong>{{error}}</strong>
            </span>
            <i :class="icon"></i>
        </div>
    </div>
</template>
<script>
export default {
    props: ['name', 'error', 'value', 'label', 'icon', 'required'],
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