@extends('layouts.admin-dash')
@section('content')
<div class="col-md-12">
        <div class="note note-info">
<div id="app" class="note note-default">

    <h3 class="text-center">Usuarios </h3>


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
              <tr v-for="user in searchedUsers" class="text-center">
                <td v-text="user.name" ></td>
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
        <div class="col-sm-6">
            <button data-toggle="modal" data-target="#crear-evaluador" class="btn btn-primary center-block">
                <i class="fa fa-plus"></i>
                Crear Usuario
            </button>
        </div>

        <!-- Pagination Buttons-->
        <div class="col-sm-6">
            <ul class="pagination pager pull-right">
                <li>
                  <a :class="{disabled: !paginacion.prev_page_url}"  @click="refresh(paginacion.prev_page_url)">
                    <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                  </a>
                </li>
                <li v-for="index in paginacion.last_page">
                      <a @click="refresh('/api/usuarios?page='+index)">@{{index}}</a>
                </li>
                <li>
                  <a :class="{disabled: !paginacion.next_page_url}"  @click="refresh(paginacion.next_page_url)">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                  </a>
                </li>
            </ul>
        </div>
        <!-- End Pagination Buttons-->

    </div>






        <div class="modal fade" tabindex="-1" role="dialog" id="crear-evaluador">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Crear Evaluador</h4>
            </div>
            <div class="modal-body">
              <form  method="post" enctype="multipart/form-data" v-on:submit.prevent="store()">
                <div class="form-group">
                  <label for="name">Nombre:</label>
                  <input type="text" name="name" required="" id="name" placeholder="Nombre" class="form-control"  autocomplete='off' v-model="newUser.name"/>
                </div>
                <div class="form-group">
                  <label for="email">Correo:</label>
                  <input type="email" name="email" id="name" required="" placeholder="Correo" class="form-control"  autocomplete='off' v-model="newUser.email">
                </div>
                <div class="form-group">
                  <label for="pass">Contraseña:</label>
                  <input type="password" name="pass" id="pass" required="" placeholder="Contraseña" class="form-control" pattern="[a-z]{3}[0-9]{4}" title="Debe tener 3 letras y 4 numero" v-model="newUser.password">
                </div>
                <div class="form-group">
                  <label for="pass">Confirmar Contraseña:</label>
                  <input type="password" name="pass" id="pass" required="" placeholder="Confirmar Contraseña" class="form-control" v-model="newUser.password_confirmation">
                </div>
                <div class="form-group">
                  <label for="rol">Cargo: </label>
                  <select name="rol" id="rol" required="" class="form-control" v-model="newUser.role" placeholder="Elija Rol">
                    <option value="admin">Administrador</option>
                    <option value="evaluator">Evaluador</option>
                  </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
              </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        </div>
    </div>
    <!-- End modal -->
</div>
@endsection
@push('styles')
  <link rel="stylesheet" href="/assets/global/plugins/bootstrap-toastr/toastr.min.css">
@endpush
@push('functions')
    <script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
    <script src="/js/usuarios.js"></script>
@endpush
