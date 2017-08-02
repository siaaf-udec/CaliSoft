<template>
    <div class="panel">
        <div class="panel-heading text-center text-uppercase" :class="{ 'bg-grey bg-font-grey': propuesta, 'bg-grey-cararra bg-font-rey-cararra': activo }">
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
    
            
                    <div class="btn-group btn-group-justified">
                        <template v-if="propuesta">
                            <a class="btn blue btn-sm" @click.prevent="acceptModal = true">Aceptar Proyecto</a>
                            <a class="btn red btn-sm" @click.prevent="destroyModal = true">Eliminar</a>
                        </template>
                        <template v-if="activo">
                            <a class="btn blue btn-sm" @click.prevent="asignedModal = true">Asignar Evaluador</a>
                        </template>
                    </div>
                
    
        </div>
    
        <modal v-model="acceptModal" title="Aceptar propuesta" :footer="false">
            <p class="text-center">
                Deseas aprobar la propuesta de proyecto {{ proyecto.nombre }}?
                <br>
                <strong>Despues de esta acción no se podra eliminar el proyecto</strong>
            </p>
            <div class="form-group">
                <button class="btn blue center-block" @click="aceptar()">Aceptar propuesta de proyecto</button>
            </div>
        </modal>
    
        <modal v-model="destroyModal" title="Eliminar Proyecto" :footer="false">
            <p class="text-center">
                Esta seguro de eliminar el proyecto {{ proyecto.nombre }}?

                <div class="form-group col-sm-12">
                    <label for="text">Razón</label>
                    <textarea  name="text" class="form-control" v-model="text" maxlength="200" required style="resize: none" rows="3"/>
                    </textarea>
                    <span v-if="formErrors['text']" class="error text-danger">
                                @{{formErrors.text[0]}}
                    </span>
                </div>

                <div class="form-group">
                    <button class="btn red center-block" @click="eliminar()">Eliminar</button>
                </div>
            </p>
        </modal>
    
        <modal v-model="asignedModal" title="Asignar Evaluador" :footer="false">
            <user-search url="/api/evaluator/search" button-text="Asignar"></user-search>
        </modal>
    
    </div>
</template>

<script>
import { Modal } from 'uiv';
import UserSearch from './user-search.vue'

export default {
    components: { Modal, UserSearch },
    props: ['proyecto'],
    data() {
        return { asignedModal: false, destroyModal: false, acceptModal: false, formErrors: {}, text:"" }
    },
    methods: {
        filtrar(tipo) {
            return this.proyecto.usuarios.filter(usuario => usuario.pivot.tipo == tipo)
                .map(usuario => usuario.name);
        },
        aceptar() {
            axios.put(`/api/proyectos/${this.proyecto.PK_id}/aceptar`).then(res => {
                this.acceptModal = false
                toastr.success('Haz Aceptado la propuesta del proyecto ' + this.proyecto.nombre);
                this.$emit('updated', Object.assign({}, this.proyecto, res.data));
            });
        },
        eliminar() {
            axios.delete('/api/proyectos/' + this.proyecto.PK_id ,{ params: { text: this.text  }  }).then(() => {
                this.destroyModal = false
                toastr.info('Haz eliminado del proyecto ' + this.proyecto.nombre);
                this.$emit('removed', this.proyecto)
            }).catch(err => this.formErrors = err.response.data);
        }
    },
    computed: {
        integrantes() {
            return this.filtrar('integrante')
        },
        evaluadores() {
            return this.filtrar('evaluador')
        },
        propuesta() {
            return this.proyecto.state == 'propuesta';
        },
        activo() {
            return this.proyecto.state == 'activo';
        }
    }
}
</script>

<style scoped>
.borderless td,
.borderless th {
    border: none;
}
</style>
