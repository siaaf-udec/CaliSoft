<template>
<div>
    <div class="table-responsive">
            <table class="table table-hover table-bordered table-condensed">
                <thead>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Plataforma</th>
                    <th class="text-center">Modelado</th>
                    
                </thead>
                <tbody>
                    <tr v-for="categoria in categorias" class="text-center">
                        <td v-text="categoria.nombre"></td>
                        <td v-text="categoria.plataforma"></td>
                        <td v-text="categoria.modelado"></td>

                    </tr>
                </tbody>
            </table>
    </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-condensed">
                    <thead>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Despliegue</th>
                        <th class="text-center">Entidad/relación</th>
                        <th class="text-center">Clases</th>
                        <th class="text-center">Actividades</th>
                        <th class="text-center">secuencia</th>
                        <th class="text-center">Uso</th>
                        
                    </thead>
                    <tbody>
                        <tr v-for="categoria in categorias" class="text-center">
                            <td v-text="categoria.nombre"></td>
                            <td v-text="categoria.despliegue"></td>
                            <td v-text="categoria.entidad_relacion"></td>
                            <td v-text="categoria.clases"></td>
                            <td v-text="categoria.actividades"></td>
                            <td v-text="categoria.sequencia"></td>
                            <td v-text="categoria.uso"></td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
</template>
<script>
export default{
    props:['categorias']
}
</script>