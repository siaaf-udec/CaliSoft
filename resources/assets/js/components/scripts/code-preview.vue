<template>
    <codemirror :code="code" :options="codeOptions"></codemirror>
</template>


<script>
export default {
    data(){
        return {
            code: "",
            codeOptions: {
                lineNumbers: true,
                mode: 'application/x-httpd-php',
                readOnly: true,
                theme: 'eclipse'
            },
        }
    
    },

    created(){
        axios.post('/api/scripts/preview/' + this.url).then(res => {
        this.code = res.data.code;
        });
    },
  props:{
      
      url:{
          type: String,
          required: true,
      }
  }
}
</script>

