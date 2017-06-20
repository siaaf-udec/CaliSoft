@extends('layouts.admin-dash')
@section('content')
    <div style="">
            <h3 class="text-center">Usuarios </h3>
    </div>
    <div>
      <button type="submit" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Crear Evaluador</button>
    </div>
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
            </tbody>
          </table>
        </div>
  </div>

  <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"><h4 class="modal-title">Crear Evaluador</h4>
      </div>
      <div class="modal-body">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" placeholder="Nombre" class="form-control">
      </div>
      <div class="modal-body">
        <label for="email">Correo:</label>
        <input type="email" name="email" id="name" placeholder="Correo" class="form-control">
      </div>
      <div class="modal-body">
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" id="pass" placeholder="Contraseña" class="form-control">
      </div>
      <div class="modal-body">
        <label for="pass">Confirmar Contraseña:</label>
        <input type="password" name="pass" id="pass" placeholder="Confirmar Contraeña" class="form-control">
      </div>
      <div class="modal-body">
        <label for="rol">Cargo: </label>
        <select name="rol" id="rol" class="form-control">
          <option value="">Elejir Opcion</option>
    			<option value="admin">Administrador</option>
    			<option value="eval">Evaluador</option>
		    </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Registrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection
