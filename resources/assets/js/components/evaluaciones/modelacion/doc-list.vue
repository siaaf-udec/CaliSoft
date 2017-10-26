<template>
    <ul class="list-group">
        <li class="list-group-item" v-for="documento in documentos" 
            :class="{'list-group-item-info': documento == active }"
            :key="documento.PK_id">
            <a @click.prevent="$emit('selected', documento)">
                {{ documento.nombre }} ({{ documento.tipo.nombre }})
            </a>
        </li>
    </ul>
</template>

<script>
export default {
  props: ["documentos", "active"]
};
</script>

