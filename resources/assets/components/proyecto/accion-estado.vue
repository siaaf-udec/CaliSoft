<template>
    <div class="btn-group btn-group-vertical center-block">
        <template v-if="proyecto.state == 'creacion'">
            <button type="button" class="btn blue" @click="$emit('propuesta')">
                Enviar Propuesta
            </button>
            <button class="btn yellow-gold" @click="$emit('editar')">
                Editar Datos
            </button>
            <button class="btn red" @click="$emit('eliminar')">
                Eliminar
            </button>
        </template>
        <template v-if="proyecto.state == 'activo'">
            <button class="btn btn-primary" @click="$emit('evaluacion')">
                Realizar Evaluacion
            </button>
        </template>
    </div>
</template>
<script>
export default {
  props: {
    proyecto: { type: Object, required: true }
  }
};
</script>
