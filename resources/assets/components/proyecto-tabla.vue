<template>
   
            <div class="panel panel-info">
                <div class="panel-heading text-center text-uppercase">PROYECTO</div>
                <div class="panel-body bg-info">
                    <table class="table table-hover table-bordered table-condensed">
                <thead>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">estado</th>
                    <th class="text-center">Modelado</th>
                    
                </thead>
                <tbody>
                    <tr v-for="proyecto in proyectos" class="text-center">
                        <td v-text="proyecto.nombre"></td>
                        <td v-text="proyecto.state"></td>
                        <td v-text=""></td>

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