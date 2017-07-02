<template>
    <div class="panel panel-success">
        <div class="panel-heading text-center">INTEGRANTES</div>
        <div class="panel-body bg-success">
            <ul class="list-group">
                <li class="list-group-item text-center" v-for="usuario in integrantes" :key="usuario.PK_id">
                    {{ usuario.name }} - {{ usuario.email }}
                </li>
                <button class="list-group-item list-group-item-info text-center">
                    <div class="text-center">
                        <span class="fa fa-plus"></span> Agregar Integrante
                    </div>    
                </button>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: ['integrantes']
}
</script>
