<template>
    <div class="panel panel-success">
        <div class="panel-heading text-center">INTEGRANTES</div>
        <div class="panel-body bg-success">
            <ul class="list-group">
                <li class="list-group-item text-center" v-for="usuario in proyecto.integrantes" :key="usuario.PK_id">
                    {{ usuario.name }} - {{ usuario.email }}
                </li>
                <student-search @selected="openInvitationModal"></student-search>
            </ul>
        </div>

        <modal id="invite-modal" title="Invitar Estudiante">
          <p class="text-justified">
            Solo podras realizar una invitacion a la vez,
            que esta se aceptada, de igual forma puedes
            cancelar la invitacion posteriormente. <br>
            Deseas invitar al estudiante <strong>{{ selected.name }}</strong>
            a tu proyecto ?
          </p>
          <div class="modal-footer" slot="footer">
            <button class="btn blue" @click="invitar()">Invitar</button>
            <button class="btn default" data-dismiss="modal">Cancelar</button>
          </div>
        </modal>
    </div>
</template>

<script>
import StudentSearch from './student-search';
import Modal from './modal';
export default {
    components: { StudentSearch, Modal },
    props: ['proyecto'],
    data(){
      return { selected: {} }
    },

    methods: {
      openInvitationModal(user){
        this.selected = user;
        $('#invite-modal').modal('show');
      },
      invitar(){
        axios.post('/api/invitations', {
          project_id: this.proyecto.PK_id,
          user_id: this.selected.PK_id,
          invitation: true
        }).then(() => {
          this.proyecto.invitaciones.push(this.selected);
          $('#invite-modal').modal('hide');
        });
      }
    }
}
</script>
