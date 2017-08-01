<template>
    <div class="panel ">
        <div class="panel-heading bg-grey text-center font-grey-cascade">INVITADOS</div>
        <div class="panel-body bg-grey">
          <ul class="list-group">
              <li class="list-group-item text-center" v-for="usuario in allUsers" :key="usuario.id">
                  {{ usuario.name }} - {{ usuario.email }}
              </li>
              <button class="list-group-item list-group-item-info text-center" data-toggle="modal" data-target="#invite-modal">
                <div class="text-center">
                  <span class="fa fa-plus"></span> Invitar
                </div>
              </button>
          </ul>

          <modal id="invite-modal" title="Invitar Usuario">
            <user-search url='/api/student/search/' button-text="invitar" @selected="invitar"></user-search>
          </modal>
        </div>
    </div>
</template>

<script>
import UserSearch from '../utils/user-search';
import Modal from '../utils/modal';

export default {
    props: ['invitados', 'proyectoId'],

    components: {
      UserSearch, Modal
    },

    data() {
        return { usuarios: [] };
    },

    methods: {
        invitar(user){
            if(this.allUsers.find(u => u.PK_id == user.PK_id)){
              toastr.error('ya se ha invitado a este usuario');
              return;
            }
            axios.post('/api/invitations', {
                project_id: this.proyectoId,
                user_id: user.PK_id,
                invitation: true
            }).then(() => {
                this.usuarios.push(user);
                toastr.info(`Has invitado ha ${user.name} a tu proyecto`);
                $('#invite-modal').modal('hide');
            });
        }
    },

    computed: {
      allUsers() {
        return [...this.usuarios, ...this.invitados];
      }
    }


  }
</script>
