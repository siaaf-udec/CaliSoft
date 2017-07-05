<template>
    <div class="form-group">
        <img v-if="preview" :src="preview" class="img-responsive img-thumbnail">
        <input type="file" id="logo" name="logo" class="inputfile" @change="fileChange" accept="image/*">
        <label for="logo" class="btn btn-primary form-control"> Imagen </label>
    </div>
</template>

<script>
export default {
    props: ['src'],
    data() {
        return { image: null };
    },
    methods: {
        fileChange(e) {
            let file = e.target.files[0];
            if (file && file.type.match('image')) {
                this.renderPreview(file);
                this.$emit('change', file); //emite el archivo hacia el parent
            };
        },
        renderPreview(file) {
            let reader = new FileReader();
            reader.addEventListener('loadend', () => this.image = reader.result);
            reader.readAsDataURL(file);
        }
    },

    computed: {
        preview(){
            return this.image || this.src
        }
    }
}
</script>

<style scoped>
.inputfile {
    display: none;
}

img {
    margin-bottom: 5px;
}
</style>
