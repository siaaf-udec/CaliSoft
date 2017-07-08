<template>
    <div class="panel ">
        <div class="panel-heading bg-grey text-center font-grey-cascade">INVITADOS</div>
        <div class="panel-body bg-grey">
          <ul class="list-group">
              <li class="list-group-item text-center" v-for="usuario in allUsers">
                  {{ usuario.name }} - {{ usuario.email }}
              </li>
              <button class="list-group-item list-group-item-info text-center" data-toggle="modal" data-target="#invite-modal">
                <div class="text-center">
                  <span class="fa fa-plus"></span> Invitar
                </div>
              </button>
          </ul>

          <modal id="invite-modal" title="Invitar Usuario">
            <student-search @invite='invitar'></student-search>
          </modal>
        </div>
    </div>
</template>

<script>
import StudentSearch from './student-search';
import Modal from './modal';

export default {
    props: ['invitados', 'proyectoId'],

    components: {
      StudentSearch, Modal
    },

    data() {
        return { usuarios: [] };
    },

    methods: {
        invitar(user){
            axios.post('/api/invitations', {
                project_id: this.proyectoId,
                user_id: user.PK_id,
                invitation: true
            }).then(() => {
                this.usuarios.push(user);
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
