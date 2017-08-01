@extends('layouts.dash')
@section('content')
<div class="col-md-12">
    @component('components.portlet', ['icon' => 'fa fa-users', 'title' => 'Usuarios'])


        <div id="app">

            <!-- Filtro de usuarios -->
            <div class="row">

                <div class="form-group col-md-4 col-xs-12">
                    <bs-select id="role-filter" title="Rol" v-model="role">
                        <option value="">Todos</option>
                        <option value="admin">Administrador</option>
                        <option value="evaluator">Evaluador</option>
                        <option value="student">Estudiante</option>
                    </bs-select>
                </div>

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
                                <button class="editar-modal btn btn-danger" title="Eliminar Usuario" @click.prevent="openDeleteModal(user)">
                                <!--<button class="editar-modal btn btn-danger" @click.prevent="destroy(user)">-->
                                    <span class="glyphicon glyphicon-trash"></span>
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
                    <button data-toggle="modal" data-target="#crear-usuario" class="btn green-jungle center-block">
                      <i class="fa fa-plus"></i>
                        Crear Usuario
                    </button>
                </div>

                <!-- Pagination Buttons-->
                <div class="col-sm-6 text-right" v-show="paginacion.last_page > 1">
                    <pagination v-model="page" :total-page="paginacion.last_page" @change="refresh" boundary-links></pagination>
                </div>
                <!-- End Pagination Buttons-->

            </div>

            <!--Inicio Modal crear usuarios-->
            <modal id="crear-usuario" title="Crear Usuario">
                <form @submit.prevent="store()">
                    <div class="form-group form-md-line-input">
                        <div class="input-icon">
                            <i class="fa fa-user"></i>
                            <input type="text" name="name" required="" id="name" placeholder="Nombre" maxlength="50" class="form-control" autocomplete='off' v-model="newUser.name"/>
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
                    <div class="form-group modal-footer">
                      <button type="submit" class="btn green-jungle">
                          <i class="fa fa-plus"></i>Registrar
                      </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fa fa-ban"></i>Cancelar
                        </button>
                    </div>
                </form>
            </modal>
            <!-- End modal crear usuarios-->

            <!--Inicio modal Eliminar usuarios-->
            <!-- inicio modal eliminar-->
            <modal id="eliminar-usuarios" title="Eliminar Usuarios">
                ¿Desea eliminar el Usuario @{{deleteUser.name}}?

                <div class="modal-footer" slot="footer">
                    <button class="btn green-jungle" @click="destroy(deleteUser)">
                        <i class="glyphicon glyphicon-trash"></i>Eliminar Usuario
                    </button>
                    <button type="button" class="btn red" data-dismiss="modal">
                        <i class="fa fa-ban"></i>Cancelar
                    </button>
                </div>
            </modal>
            <!-- Fin Modal Eliminar -->

        </div>
        @include('partials.modal-help-usuario')
    @endcomponent
</div>
@endsection
@push('styles')
  <link rel="stylesheet" href="/assets/global/plugins/bootstrap-toastr/toastr.min.css">
  <link rel="stylesheet" href="/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css">
@endpush

@push('functions')
  <script src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/global/plugins/jquery-validation/js/localization/messages_es.js') }}" type="text/javascript"></script>

  <script src="{{ asset('assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>

  <script src="/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
  <script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
  <script src="/js/usuarios.js"></script>

  <script>
    $("#registro").validate();
  </script>
@endpush
