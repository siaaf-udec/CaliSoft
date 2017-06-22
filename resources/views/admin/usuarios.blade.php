@extends('layouts.admin-dash')
@section('content')
<div class="col-md-12">
        <div class="note note-info">
    <div style="">
            <h3 class="text-center">Usuarios </h3>
    </div>

    <div class="col-md-9">
      <button type="submit" data-toggle="modal" data-target="#crear-evaluador" class="btn btn-primary">Crear Usuario</button>
    </div>
    <div class="col-md-1">
      <label for="cargo">Cargo:</label>
    </div>
    <div>
      <select class="bs-select form-control input-small" data-style="btn-primary">
          <option>Administrador</option>
          <option>Evaluador</option>
          <option>Estudiante</option>
      </select>
    </div>
    <br><br>

    <div id="app">
      <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered table-condensed">
          <thead>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Rol</th>
              <th>Operacion</th>
            </thead>
            <tbody>
              <tr v-for="user in usuarios">
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
        </div><!-- /.modal -->

  </div>
  </div>
</div>


@endsection
@push('functions')
    <script src="/js/usuarios.js"></script>
@endpush
