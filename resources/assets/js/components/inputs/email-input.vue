<template>
    <div class="form-group form-md-line-input" :class="{'has-error':error}">
        <div class="input-icon">
            <input type="email" :name="name" class="form-control" v-model="local" :required="required" />
            <label :for="name" class="control-label">{{label}}</label>
            <span v-if="error" class=" help-block">
                <strong>{{error[0]}}</strong>
            </span>
            <i class="fa fa-envelope-o"></i>
        </div>
    </div>
</template>
<script>
export default {
    props: ['name', 'error', 'value', 'label', 'required'],
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