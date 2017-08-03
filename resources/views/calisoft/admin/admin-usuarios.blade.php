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
              <div class="col-md-12">
            <br>
            <br>
            <br>
            <br>
              </div>
                <table class="table table-hover table-bordered table-condensed" id="usuario">
                    <thead>
                      <tr>

                        <th class="text-center">Nombre</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Rol</th>
                        <th class="text-center">Operacion</th>
                        </tr>
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
                <form @submit.prevent="store()" id="user-create">
                  <div class="form-group form-md-line-input">
                              <div class="input-icon">
                                <input type="text" name="name" required="" id="name" placeholder="Nombre" class="form-control" v-model="newUser.name"/>
                                <label for="name" class="control-label"></label>
                                <i class="fa fa-user"></i>
                              </div>
                            </div>
                            <div class="form-group form-md-line-input" :class="{'has-error': errors.email }">
                              <div class="input-icon">
                                <input type="email"  name="email"  required="" id="name" placeholder="Correo" class="form-control" v-model="newUser.email"/>
                                <label for="email" class="control-label"></label>
                                <label class="help-block" v-if="errors.email">@{{errors.email.join(' ')}}</label>
                                <i class="fa fa-envelope-o"></i>
                              </div>
                            </div>
                            <div class="form-group form-md-line-input" :class="{'has-error': errors.password }">
                              <div class="input-icon">
                                <input type="password"  name="pass" required="" id="pass" placeholder="Contraseña" class="form-control" v-model="newUser.password"/>
                                <label for="password" class="control-label"></label>
                                <label v-if="errors.password">@{{errors.password.join(' ')}}</label>
                                <i class="fa fa-key"></i>
                              </div>
                            </div>
                            <div class="form-group form-md-line-input">
                              <div class="input-icon">
                                <input type="password"  name="pass" required="" id="pass" placeholder="Confirmar Contraseña" class="form-control" v-model="newUser.password_confirmation"/>
                                <label for="confirm-password" class="control-label"></label>
                                <i class="fa fa-key"></i>
                              </div>
                            </div>
                            <div class="form-group form-md-line-input">
                              <div class="input-icon">
                                <select id="role" class="form-control" v-model="newUser.role" required="">
                                          <option value="admin">Administrador</option>
                                          <option value="evaluator">Evaluador</option>
                                      </select>
                                <label for="role" class="control-label"></label>
                                <i class="fa fa-users"></i>
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
  <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="/assets/global/plugins/bootstrap-toastr/toastr.min.css">
  <link rel="stylesheet" href="/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css">
@endpush

@push('functions')
  <!-- Datatables Scripts -->
  <script src="{{ asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>

  <script src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/global/plugins/jquery-validation/js/localization/messages_es.js') }}" type="text/javascript"></script>

  <script src="{{ asset('assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>

  <script src="/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
  <script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
  <script src="/js/usuarios.js"></script>
@endpush

@push('functions')
<script>
    jQuery(document).ready(function () {

        var tabla_novedades = $('#usuario').DataTable({
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "Todo"]
            ],
            responsive: true,
            columnDefs: [
                { targets: 'no-sort', orderable: false }
            ],
            language: {
                "bProcessing": '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i> <span class="sr-only">Procesando...</span>',
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
            buttons: [
                { extend: 'print', className: 'btn btn-circle btn-icon-only btn-default tooltips t-print', text: '<i class="fa fa-print"></i>'},
                { extend: 'copy', className: 'btn btn-circle btn-icon-only btn-default tooltips t-copy', text: '<i class="fa fa-files-o"></i>'},
                { extend: 'pdf', className: 'btn btn-circle btn-icon-only btn-default tooltips t-pdf', text: '<i class="fa fa-file-pdf-o"></i>'},
                { extend: 'excel', className: 'btn btn-circle btn-icon-only btn-default tooltips t-excel', text: '<i class="fa fa-file-excel-o"></i>'},
                { extend: 'csv', className: 'btn btn-circle btn-icon-only btn-default tooltips t-csv',  text: '<i class="fa fa-file-text-o"></i>'},
                { extend: 'colvis', className: 'btn btn-circle btn-icon-only btn-default tooltips t-colvis', text: '<i class="fa fa-bars"></i>'}

            ],
            tabIndex: -1,
            pageLength: 10,
            dom: "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
        });
    });
</script>
@endpush
