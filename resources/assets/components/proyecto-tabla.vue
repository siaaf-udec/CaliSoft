<template>
   
            <div class="panel panel-info">
                <div class="panel-heading text-center text-uppercase">PROYECTO</div>
                <div class="panel-body bg-info">
                    <table class="table" v-if="proyectos.nombre">
                        <tbody>
                            <tr>
                                <th>Nombre:</th>
                                <td>{{ proyectos.nombre }}</td>
                            </tr>
                            <tr>
                                <th>Estado:</th>
                                <td class="text-uppercase">{{ proyectos.state }}</td>
                            </tr>
                            <tr>
                                <th>Categoria:</th>
                                <td>{{ proyectos.categoria.nombre }}</td>
                            </tr>
                            <tr>
                                <th>Semillero</th>
                                <td>{{ proyectos.semillero.nombre }}</td>
                            </tr>
                            <tr>
                                <th>Grupo de investigacion:</th>
                                <td>{{ proyectos.grupo_de_investigacion.nombre }}</td>
                            </tr>
                            <tr>
                                <th>Creado el:</th>
                                <td>{{ new Date(proyectos.created_at).toLocaleDateString() }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="btn-group btn-group-vertical center-block">
                        <button class="btn blue">Aceptar Proyecto</button>
                        <button class="btn red">Eliminar</button>
                    </div>
                </div>
            </div>
        
</template>

<script>
export default {
    props: ['proyectos']
}
</script>