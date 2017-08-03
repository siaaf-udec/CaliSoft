@extends('layouts.dash')
@section('content')
<div class="col-md-12">
    @component('components.portlet', ['icon' => 'fa fa-users', 'title' => 'Usuarios'])


        <div id="app">

            <!-- Filtro de usuarios -->
            <div class="row">

                
                    <div class="col-sm-4 col-xs-12">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="" class="control-label col-xs-4">Mostrar</label>
                                <div class="col-xs-4 col-sm-5">
                                    <select  class="form-control" v-model="paginator.show">
                                        <option value="5">5</option>
                                        <option value="10" selected>10</option>
                                        <option value="15">15</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                

                <div class="col-sm-offset-4 col-sm-4 col-xs-12" style="margin-bottom: 2%">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar" v-model="search">
                        <span class="input-group-addon">
                        <i class="glyphicon glyphicon-search"></i>
                        </span>
                    </div>

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
                        <tr v-for="user in paginator.items" class="text-center">
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
                <div class="col-sm-6 text-right" v-show="paginator.lastPage > 1">
                    <pagination v-model="paginator.page" :total-page="paginator.lastPage" boundary-links></pagination>
                </div>
                <!-- End Pagination Buttons-->
            </div>
            <!--Inicio Modal crear usuarios-->
            <modal id="crear-usuario" title="Crear Usuario">
                <form @submit.prevent="store()" id="user-create">
                  <text-input name="name" v-model="newUser.name" label="Nombre" icon="fa fa-user" required></text-input>
                  <email-input name="email" :error="errors.email"  v-model="newUser.email" label="Correo" icon="fa fa-envelope-o" required></email-input>
                  <password-input name="password" :error="errors.password"  v-model="newUser.password" label="Contraseña" icon="fa fa-key" required></password-input>
                  <password-input name="password"  v-model="newUser.password_confirmation" label="Confirmar Contraseña" icon="fa fa-key" required></password-input>

                  <select-input v-model="newUser.role" name="role" icon="fa fa-users" label="Role" required>
                    <option value="admin">Administrador</option>
                    <option value="evaluator">Evaluador</option>
                  </select-input>

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


@endpush
