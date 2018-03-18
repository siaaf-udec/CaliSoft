<template>
    <section>
        <button class="btn btn-primary btn-block" @click="modal=true">Ver Resultados</button>
        <modal v-model="modal" title="Resultados" :footer="false">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Modelacion</th>
                        <td>{{ calificaciones.modelacion }}</td>
                    </tr>
                    <tr>
                        <th>Plataforma</th>
                        <td>{{ calificaciones.plataforma }}</td>
                    </tr>
                    <tr>
                        <th>Codificacion</th>
                        <td>{{ calificaciones.codificacion }}</td>
                    </tr>
                    <tr>
                        <th>Base de Datos</th>
                        <td>{{ calificaciones.basedatos }} </td>
                    </tr>
                    <tr class="info">
                        <th>Total</th>
                        <th>{{ calificaciones.total }}</th>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-success btn-block">Obtener Reporte</button>
        </modal>
    </section>
</template>
<script>
import { Modal } from "uiv"
export default {
    components: { Modal },
    props: ['proyectoId'],
    data() {
        return { calificaciones: {}, loading: false, modal: false }
    },
    mounted() {
        this.loading = true
        axios.get(`/api/proyectos/${this.proyectoId}/total`).then(res => {
            this.calificaciones = res.data;
            this.loading = false;
        })
    }
}
</script>
