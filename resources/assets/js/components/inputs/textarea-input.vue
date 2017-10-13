<template>
    <div class="form-group form-md-line-input" :class="{'has-error':error}">
        <textarea :name="name" class="form-control" v-model="local" :maxlength="maxlength" :required="required" :id="id" style="resize: none" rows="3" />
        </textarea>
        <label :for="name">{{label}}</label>
        <span v-if="error" class=" help-block">
                <strong>{{error[0]}}</strong>
        </span>
   </div>
</template>
<script>
export default {
    name: 'textarea-input',
    props: ['name', 'error', 'value', 'label', 'required','maxlength', 'id'],
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