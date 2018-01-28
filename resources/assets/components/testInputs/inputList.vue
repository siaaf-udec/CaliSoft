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
                            <input class="form-control" v-bind="input" v-validate="input.testInput">
                            <span class="text-danger" v-if="errors.has(input.name)">
                                {{ errors.first(input.name) }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <button class="btn green-jungle center-block" @click="iniciarPrueba()">
            <i class="fa fa-plus"></i> Iniciar prueba   
        </button>
    </section>

</template>

<script>
export default {
    props:['formulario'],
    data() {
        return {
            values: []
        }
    },
    methods:{
        getTipo(input){
            return this.tipos.find(tipos => input.testInput == tipos.PK_id)
        },
        iniciarPrueba() {
            axios.post('/api/testing', {
                inputs: this.formulario.map(input => input.type)
            }).then(response => {
                this.values = response.data.values
                this.formulario = this.formulario.map((input, index) => {
                    input.value = this.values[index]
                    return input
                });
            })
        }
    }    
}
</script>
