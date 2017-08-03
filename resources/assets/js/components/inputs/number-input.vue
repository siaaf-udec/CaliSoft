<template>
    <div class="form-group col-sm-6 form-md-line-input" :class="{'has-error':error}">
        <div class="input-icon">
            <input type="number" :name="name" class="form-control" v-model="local"  :min="min" :max="max" :required="required" />
            <label :for="name" class="control-label">{{label}}</label>
            <span v-if="error" class=" help-block">
                <strong>{{error[0]}}</strong>
            </span>
            <i :class="icon"></i>
        </div>
    </div>
</template>
<script>
export default {
    props: ['name', 'error', 'value', 'label', 'icon', 'required','min','max'],
    data() {
        return { local: this.value }
    },

    beforeUpdate(){
        this.local = this.value
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