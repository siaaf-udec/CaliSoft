<template>
    <div>
        <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%">
                            <thead>
                                <th class="text-center">Nombre Del Archivo</th>
                                
                                <th class="text-center">Operaciones</th>
                            </thead>
                            <tbody >
                                <tr v-for="script in paginator.items" class="text-center">
                                    <td v-text="script.url"></td>
                                    
                                    <td class="text-center">
                                        <div v-if="script.estado == 'sin calificar'">
                                        <a :href="`/evaluar-codificacion/${script.PK_id}`" class="btn btn-warning btn-xs" title="Calificar" >
                                            <span class="fa fa-asterisk"></span>
                                        </a>
                                    </div>
                                        <button v-if="script.estado == 'calificado'" class="editar-item btn blue btn-xs" title="Ver Calificacion" @click="modal(script.PK_id)">
                                            <span class="glyphicon glyphicon-check"></span>
                                        </button>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
    </div>
</template>
<script>
</script>