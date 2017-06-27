@extends('layouts.admin-dash')

@section('content')
<div class="col-md-12">
    <div class="note note-info">
        <div id="app" class="note note-default">

            <h3 class="text-center">Usuarios </h3>

            <!-- Filtro de usuarios -->
            <div class="row">
                <form class="form-horizontal">
                    <div class="form-group col-xs-12 col-md-6 col-lg-4">
                        <label class="control-label col-md-2 hidden-xs" for="role">Rol:</label>
                        <div class="col-md-10">
                            <select class="form-control" v-model="role">
                                <option value="">Todos</option>
                                <option value="admin">Administrador</option>
                                <option value="evaluator">Evaluador</option>
                                <option value="student">Estudiante</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>




            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-condensed">
                    <thead>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Rol</th>
                        <th class="text-center">Operacion</th>
                    </thead>
                    <tbody>
                        <tr v-for="user in usuarios" class="text-center">
                            <td v-text="user.name"></td>
                            <td v-text="user.email"></td>
                            <td v-text="user.role"></td>
                            <td>
                                <button class="editar-modal btn btn-danger" @click.prevent="destroy(user)">
                                    <span class="glyphicon glyphicon-trash"></span>Eliminar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End Table -->


            <div class="row">
                <!-- Boton de crear usuario -->
                <div class="col-sm-6">
                    <button data-toggle="modal" data-target="#crear-usuario" class="btn btn-primary center-block">
                        Crear Usuario
                    </button>
                </div>

                <!-- Pagination Buttons-->
                <div class="col-sm-6">
                    <ul class="pagination pager pull-right">
                        <li>
                            <a :class="{disabled: !paginacion.prev_page_url}" @click="refresh(paginacion.prev_page_url)">
                        <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                    </a>
                        </li>
                        <li v-for="index in paginacion.last_page">
                            <a @click="refresh('/api/usuarios', { page: index })">@{{index}}</a>
                        </li>
                        <li>
                            <a :class="{disabled: !paginacion.next_page_url}" @click="refresh(paginacion.next_page_url)">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </a>
                        </li>
                    </ul>
                </div>
                <!-- End Pagination Buttons-->

            </div>

            <!--Inicio Modal-->
            <modal id="crear-usuario" title="Crear Usuario">
                <form @submit.prevent="store()">
                    <div class="form-group form-md-line-input">
                        <div class="input-icon">
                            <i class="fa fa-user"></i>
                            <input type="text" name="name" required="" id="name" placeholder="Nombre" class="form-control" autocomplete='off' v-model="newUser.name"
                            />
                        </div>
                    </div>
                    <div class="form-group form-md-line-input" :class="{'has-error': errors.email }">
                        <div class="input-icon">
                            <i class="fa fa-envelope-o"></i>
                            <input type="email" name="email" id="name" required="" placeholder="Correo" class="form-control" autocomplete='off' v-model="newUser.email">
                            <label class="help-block" v-if="errors.email">@{{errors.email.join(' ')}}</label>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input" :class="{'has-error': errors.password }" >
                        <div class="input-icon">
                            <i class="fa fa-key"></i>
                            <input type="password" name="pass" id="pass" placeholder="Contraseña" class="form-control" v-model="newUser.password" required>
                            <label v-if="errors.password">@{{errors.password.join(' ')}}</label>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <div class="input-icon">
                            <i class="fa fa-key"></i>
                            <input type="password" name="pass" id="pass" required="" placeholder="Confirmar Contraseña" class="form-control" v-model="newUser.password_confirmation">
                        </div>
                    </div>
                    <div class="form-group form-md-line-input">
                        <div class="input-icon">
                            <i class="fa fa-users"></i>
                            <label for="role">Rol</label>
                            <select id="role" class="form-control" v-model="newUser.role" required>
                                <option value="admin">Administrador</option>
                                <option value="evaluator">Evaluador</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fa fa-ban"></i>Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i>Registrar
                        </button>
                    </div>
                </form>
            </modal>
            <!-- End modal -->
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="/assets/global/plugins/bootstrap-toastr/toastr.min.css"> @endpush

@push('functions')
<script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
<script src="/js/usuarios.js"></script>
@endpush
