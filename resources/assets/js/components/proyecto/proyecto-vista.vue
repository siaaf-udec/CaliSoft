<template>
  <section >
    <div class="row" v-if="proyecto.nombre">
        <div class="col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading text-center text-uppercase">PROYECTO</div>
                <div class="panel-body bg-info">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Nombre:</th>
                                <td>{{ proyecto.nombre }}</td>
                            </tr>
                            <tr>
                                <th>Estado:</th>
                                <td class="text-uppercase">
                                  <strong>{{ proyecto.state }}</strong>
                                </td>
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

                    <div class="btn-group btn-group-vertical center-block" v-if="proyecto.state == 'creacion'">
                      <button type="button" class="btn blue" data-toggle="modal" href="#propuesta">Enviar Propuesta</button>
                      <button class="btn yellow-gold" @click.prevent="openEditModal(proyecto)">Editar Datos</button>
                      <button class="btn red" data-toggle="modal" href="#eliminar">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <!-- Integrantes -->
            <div class="row">
                <proyecto-integrantes :integrantes="integrantes" :project-id="proyecto.PK_id">
                </proyecto-integrantes>
            </div>

            <!-- Evaluadores -->
            <div class="row" v-if="evaluadores.length">
                <proyecto-evaluadores :evaluadores="evaluadores">
                </proyecto-evaluadores>
            </div>

            <!-- Invitados -->
            <div class="row">
              <proyecto-invitados :invitados="invitados" :proyecto-id="proyecto.PK_id" v-if="proyecto.state == 'creacion'">
              </proyecto-invitados>
            </div>
        </div>

    </div>
    <p class="text-justify" v-else>
        Todavia no has creado una propuesta de proyecto,
        puedes crearla <a href="/proyectos">Aqui.</a>
    </p>

    <!-- comienzo modal de edicion-->
    <modal id="editar-proyecto" title="Editar Proyecto">
         <proyecto-editar :proyecto="fillProyecto" @update="update">
         </proyecto-editar>
    </modal>

    <!-- comienzo modal de envio de propuesta -->
    <modal id="propuesta" title="Propuesta">
      <p class="text-justified">
        Despues de pasar el proyecto como propuesta
        <strong>no podras agregar integrantes ni editar los datos del mismo</strong>.
        Deseas pasar el proyecto como propuesta?
      </p>
      <div class="form-group">
        <button class="btn blue center-block" @click="propuesta()">Pasar propuesta de proyecto</button>
      </div>
    </modal>

    <!-- Eliminar proyecto -->
    <modal id="eliminar" title="Eliminar Proyecto">
      <p class="text-center">
        todas las invitaciones seran canceladas y los integrantes seran liberados. <br>
        Desea eliminar el proyecto?
        <div class="form-group">
          <button class="btn red center-block" @click="destroy()">Eliminar</button>
        </div>
      </p>
    </modal>

  </section>
</template>

<script>
import ProyectoIntegrantes from "./proyecto-integrantes";
import ProyectoEvaluadores from "./proyecto-evaluadores";
import ProyectoInvitados from "./proyecto-invitados";
import Modal from "../utils/modal";
import proyectoEditar from "./proyecto-editar";

export default {
    components: {
        ProyectoIntegrantes,
        ProyectoEvaluadores,
        ProyectoInvitados,
        Modal,
        proyectoEditar,
    },
    data(){
        return { proyecto: {},
                 fillProyecto:{},
        };
    },
    created(){
        axios.get('/api/user/proyectos').then(res => this.proyecto = res.data[0]);
    },

    computed: {
        integrantes(){
            return this.filtrarUsuario('integrante');
        },
        evaluadores(){
            return this.filtrarUsuario('evaluador');
        },
        invitados(){
            return this.filtrarUsuario('invitado');
        }
    },
    methods: {
        filtrarUsuario(tipo){
            return this.proyecto.usuarios ?
                this.proyecto.usuarios.filter(usuario => usuario.pivot.tipo == tipo) : []
        },
        openEditModal(proyecto){
          this.fillProyecto = Object.assign({},proyecto);
          $('#editar-proyecto').modal("show");
        },
        update(proyecto){
          this.proyecto = proyecto;
          $('#editar-proyecto').modal("hide");
          toastr.info('Datos del proyecto actualizados con exito');
        },
        propuesta(){
          axios.put(`/api/proyectos/${this.proyecto.PK_id}/propuesta`).then(res => {
            this.proyecto = Object.assign({}, this.proyecto, res.data);
            $('#propuesta').modal('hide');
            toastr.info('Has pasado el proyecto como propuesta');
          })
        },
        destroy(){
          axios.delete('/api/proyectos/' + this.proyecto.PK_id).then(() => {
            this.proyecto = {};
            $('#eliminar').modal('hide');
            axios.info('Has eliminado el proyecto');
          })
        }
    }
}
</script>
