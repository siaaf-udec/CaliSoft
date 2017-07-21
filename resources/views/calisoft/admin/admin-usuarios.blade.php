@extends('layouts.admin-dash')

@section('content')
<div class="col-md-12">
    @component('components.portlet', ['icon' => 'fa fa-users', 'title' => 'Usuarios'])


        <div id="app">

            <!-- Filtro de usuarios -->
            <div class="row">

                <div class="form-group col-md-4 col-xs-12">
                    <bs-select id="role-filter" title="Rol" v-model="role" :get-options="roles">
                        <option value="">Todos</option>
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
                            <td v-text="user.roles[0].display_name"></td>
                            <td>
                                <button class="editar-modal btn btn-danger" @click.prevent="openDeleteModal(user)">
                                <!--<button class="editar-modal btn btn-danger" @click.prevent="destroy(user)">-->
                                    <span class="glyphicon glyphicon-trash"></span>Eliminar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <!-- Paginacion -->
            <div class="row">
                <!-- Boton de crear usuario -->
                <div class="col-sm-6">
                    <button data-toggle="modal" data-target="#crear-usuario" class="btn green-jungle center-block">
                        Crear Usuario
                    </button>
                </div>

                <!-- Pagination Buttons-->
                <div class="col-sm-6" v-show="paginacion.last_page > 1">
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

            <!--Inicio Modal crear Usuarios-->
            <div class="modal fade" id="crear-usuari" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Usuarios</h5>
                  </div>
                  <div class="modal-body">
                    <form @submit.prevent="store()" id="registro">
                      <div class="form-group form-md-line-input">
                          <div class="input-icon">
                              <input  class="form-control" id="name" name="name" type="text" maxlength="10" v-model="newUser.name"/>
                              <label  class="control-label">Nombre</label>
                              <span class="help-block">Digite el Nombre</span>
                              <i class="fa fa-user"></i>
                          </div>
                      </div>
                      <div class="form-group form-md-line-input">
                          <div class="input-icon">
                              <input  class="form-control" id="correo" name="correo" type="email" maxlength="50" v-model="newUser.email"/>
                              <label  class="control-label">Correo</label>

                              <i class="fa fa-envelope-o"></i>
                          </div>
                      </div>
                      <div class="form-group form-md-line-input">
                          <div class="input-icon">
                              <input  class="form-control" id="password" name="password" type="password" maxlength="10" v-model="newUser.password"/>
                              <label  class="control-label">Contraseña</label>
                              <span class="help-block">Digite la contraseña</span>
                              <i class="fa fa-envelope-o"></i>
                          </div>
                      </div>
                      <div class="form-group form-md-line-input">
                          <div class="input-icon">
                              <input  class="form-control" name="password" type="password" maxlength="10" v-model="newUser.password_confirmation"/>
                              <label  class="control-label">Confirmar Contraseña</label>
                              <span class="help-block">Confirmar la contraseña</span>
                              <i class="fa fa-envelope-o"></i>
                          </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>

            <!--Fin modal crear usuarios-->

            <!--Inicio Modal crear usuarios-->
            <<modal id="crear-usuario" title="Crear Usuario">
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
                        <i class="fa fa-edit"></i>Eliminar Usuario
                    </button>
                    <button type="button" class="btn red" data-dismiss="modal">
                        <i class="fa fa-ban"></i>Cancelar
                    </button>
                </div>
            </modal>
            <!-- Fin Modal Eliminar -->
            @include('partials.modalHelpUsuario')
        </div>
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
