<template>
    <select :id="id" class="form-control selectpicker" :value.native="value" :title="title" @change="change" :required="required">
      <slot></slot>
      <option :value="opt.value" v-for="opt in options">
        {{ opt.label }}
      </option>
    </select>
</template>

<script>
export default {
    props: ['id', 'required', 'getOptions', 'title', 'value'],
    data(){
        return { options: [] }
    },

    created(){
      this.getOptions().then(options => this.options = options);
    },

    methods: {
        change(e) {
            this.$emit('input', e.target.value);
        }
    }
}
</script>
