<template>
    <form @submit.prevent="$emit('update', componente)">
        <textarea-input name="observacion" label="Observacion" v-model="componente.pivot.observacion"/>
        <div class="row">
            <div class="col-sm-6 text-center">
                <bs-switch :id="componente.PK_id" label="VALIDO" v-model="componente.pivot.checked" :options="switchOptions" />
            </div>
            <div class="col-sm-6 text-center">
                <button type="submit" class="btn blue">Guardar</button>
            </div>
        </div>
    </form>
</template>
<script>
import BsSwitch from '../bs/bs-switch'
import TextareaInput from '../inputs/textarea-input';
import _ from 'lodash';

export default {
    components: { BsSwitch, TextareaInput },
    props: ['evaluation'],
    data() {
        return { 
            componente: _.cloneDeep(this.evaluation),
            switchOptions: {
                onText: 'SI',
                offText: 'NO',
                onColor: 'success',
                offColor: 'danger'
            } 
        }
    },
    watch: {
        evaluation() {
            this.componente = _.cloneDeep(this.evaluation);
        }
    }
}
</script>
