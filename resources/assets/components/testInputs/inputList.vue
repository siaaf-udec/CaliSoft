<template>
    <section>
        <form>
            <table class="table table-striped table-bordered table-hover" id="sample">
                <thead>
                    <tr>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Reglas</th>
                        <th class="text-center">Input</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(input,index) in formulario" :key="index" class="text-center">
                        <td>{{ input.type }}</td>
                        <td>{{ input.name || input.id || index }}</td>
                        <td>{{ input.testInput }}</td>
                        <td>
                            <input class="form-control" v-bind="input" :value="values[index]"  v-validate="input.testInput"
                                @input="values[index] = $event.target.value">
                            <span class="text-danger" v-if="errors.has(input.name)">
                                {{ errors.first(input.name) }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <button class="btn green-jungle center-block" @click="cargar()">
            <i class="fa fa-plus"></i> Cargar prueba   
        </button>
    </section>

</template>

<script>
export default {
    props:['formulario'],
    data() {
        return {
            values: [],
            tipos: ['normal', 'sql', 'xss'],
            selected: -1
        }
    },
    methods:{
        cargar() {
            this.select()
            axios.post('/api/testing', {
                inputs: this.formulario.map(input => input.type),
                tipo: this.tipos[this.selected]
            }).then(response => {
                this.values = response.data.values
                setTimeout(() => this.validar())
            })
        },
        validar() {
            this.$validator.validateAll();
        },
        select() {
            this.selected += 1;
            if (this.selected >= this.tipos.length) {
                this.selected = 0
            }  
        }
    }    
}
</script>
