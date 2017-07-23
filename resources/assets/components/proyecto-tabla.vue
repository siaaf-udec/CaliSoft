<template>

    <div class="panel">
        <div class="panel-heading text-center text-uppercase"
            :class="{ 'bg-grey bg-font-grey': propuesta, 'bg-grey-cararra bg-font-rey-cararra': activo }">
            PROYECTO
        </div>
        <div class="panel-body" :class="{ 'bg-grey': propuesta, 'bg-grey-cararra': activo }">
            <table class="table table-condensed borderless">
                <tbody>
                    <tr>
                        <th>Nombre:</th>
                        <td>{{ proyecto.nombre }}</td>
                    </tr>
                    <tr>
                      <th>Integrantes:</th>
                      <td>{{integrantes.join(", ")}}</td>
                    </tr>
                    <tr v-if="evaluadores.length">
                      <th>Evaluadores:</th>
                      <td>{{evaluadores.join(", ")}}</td>
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

            <div class="btn-group btn-group-vertical center-block btn-group-sm">
                <template v-if="propuesta">
                    <button class="btn blue btn-sm" data-toggle="modal" data-target="#acceptModal">Aceptar Proyecto</button>
                    <button class="btn red btn-sm">Eliminar</button>
                </template>
                <template v-if="activo">
                    <button class="btn blue btn-sm">Asignar Evaluador</button>
                </template>
            </div>
        </div>

        <modal id="acceptModal" title="Aceptar propuesta">
            <p class="text-center">
              Deseas aprobar la propuesta de proyecto {{ proyecto.nombre }}?<br>
              <strong>Despues de esta acción no se podra eliminar el proyecto</strong>
            </p>
            <div class="form-group">
              <button class="btn blue center-block" @click="aceptar()">Aceptar propuesta de proyecto</button>
            </div>
        </modal>

    </div>

</template>

<script>
import Modal from './modal';
export default {
    components: { Modal },
    props: ['proyecto'],
    methods:{
      filtrar(tipo){
        return this.proyecto.usuarios.filter(usuario => usuario.pivot.tipo == tipo)
          .map(usuario => usuario.name);
      },
      aceptar(){
          axios.put(`/api/proyectos/${this.proyecto.PK_id}/aceptar`).then(res => {
              $('#acceptModal').modal('hide');
              toastr.success('Haz Aceptado la propuesta del proyecto ' + this.proyecto.nombre);
              this.$emit('updated', Object.assign({}, this.proyecto, res.data));
          });
      }
    },
    computed:{
        integrantes(){
            return this.filtrar('integrante')
        },
        evaluadores(){
            return this.filtrar('evaluador')
        },
        propuesta(){
            return this.proyecto.state == 'propuesta';
        },
        activo(){
            return this.proyecto.state == 'activo';
        }
    }
}
</script>

<style scoped>
.borderless td, .borderless th {
border: none;
}
</style>
