<template>
    <li class="dropdown dropdown-extended dropdown-notification">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
            data-close-others="true" @click="mark()">
            <i class="icon-bell"></i>
            <span class="badge badge-default" v-show="count > 0">{{ count }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="external">
                <h3>notificaciones</h3>
                <a href="/notificaciones">Ver todos </a>
            </li>
            <li>
                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                    <li v-for="notificacion in notificaciones" :key="notificacion.id">
                        <a :href="notificacion.data.url" >
                            <span class="time">
                                {{ new Date(notificacion.created_at || null).toLocaleDateString() }}
                            </span>
                            <component :is="notificacion.data.type" :notificacion="notificacion"></component>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
</template>

<script>
import ProyectoCreado from './proyecto-creado';
import InvitacionRecibida from './invitacion-recibida';
import InvitacionAceptada from './invitacion-aceptada';
import InvitacionRechazada from './invitacion-rechazada';
import ProyectoDenegado from './proyecto-denegado';
import ProyectoAsignado from './proyecto-asignado';
import EvaluadorAsignado from './evaluador-asignado';
import ProyectoAceptado from './proyecto-aceptado';


export default {
    components: { ProyectoCreado, InvitacionRecibida, ProyectoDenegado, ProyectoAsignado, InvitacionRechazada,
                  InvitacionAceptada, ProyectoAceptado, EvaluadorAsignado },
    data(){
        return { count: 0, notificaciones: [] };
    },
    created(){
        axios.get('/api/notificaciones').then(res => {
            this.notificaciones = res.data;
            this.count = this.notificaciones.filter(noti => !noti.read_at).length;
        });
    },
    mounted(){
        let id = $("meta[name='user-id']").attr('content');
        window.Echo.private('users.' + id).notification(notificacion => {
            this.notificaciones.push(notificacion);
            this.count += 1;
            toastr.info(notificacion.data.alert);
        });
    },
    methods: {
        mark(){
            if(!this.count) return;
            axios.post('/api/notificaciones').then(() => this.count = 0);
        }
    }
}
</script>