<template>
    <span class="details">
        <span class="label label-sm label-icon label-danger">
            <i class="fa fa-minus"></i>
        </span>

        <span>
            Se le elimino el proyecto: <strong>{{ notificacion.data.proyecto }}</strong>. <br>Presione click para ver la razón.
        </span>
    </span>
</template>

<script>
export default {
    props: ['notificacion']
}
</script>
