<template>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading text-center text-uppercase">PROYECTO</div>
                <div class="panel-body bg-info">
                    <table class="table" v-if="proyecto.nombre">
                        <tbody>
                            <tr>
                                <th>Nombre:</th>
                                <td>{{ proyecto.nombre }}</td>
                            </tr>
                            <tr>
                                <th>Estado:</th>
                                <td class="text-uppercase">{{ proyecto.state }}</td>
                            </tr>
                            <tr>
                                <th>Categoria:</th>
                                <td>{{ proyecto.categoria.nombre }}</td>
                            </tr>
                            <tr>
                                <th>Semillero</th>
                                <td>{{ proyecto.semillero.nombre }}</td>
                            </tr>
                            <tr>
                                <th>Grupo de investigacion:</th>
                                <td>{{ proyecto.grupo_de_investigacion.nombre }}</td>
                            </tr>
                            <tr>
                                <th>Creado el:</th>
                                <td>{{ new Date(proyecto.created_at).toLocaleDateString() }}</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div class="btn-group btn-group-vertical center-block">
                        <button class="btn blue">Enviar Propuesta</button>
                        <button class="btn yellow-gold">Editar Datos</button>
                        <button class="btn red">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <!-- Integrantes -->
            <div class="row">
                <proyecto-integrantes :integrantes="proyecto.integrantes"></proyecto-integrantes>
            </div>
            
            <!-- Evaluadores -->
            <div class="row">
                <proyecto-evaluadores :evaluadores="proyecto.evaluadores"></proyecto-evaluadores>
            </div>
        </div>

        
    </div>
    
</template>

<script>
import ProyectoIntegrantes from "./proyecto-integrantes";
import ProyectoEvaluadores from "./proyecto-evaluadores"

export default {
    components: {
        ProyectoIntegrantes,
        ProyectoEvaluadores
    },
    data(){
        return { proyecto: {} };
    },
    created(){
        axios.get('/api/user/project').then(res => this.proyecto = res.data);
    }
}
</script>

