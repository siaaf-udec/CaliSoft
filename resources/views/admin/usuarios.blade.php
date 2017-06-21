@extends('layouts.admin-dash') @section('content')
<div style="">
    <h3 class="text-center">Usuarios </h3>
</div>
<div>
    <button type="submit" data-toggle="modal" data-target="#crear-evaluador" class="btn btn-primary">Crear Usuario</button>
</div>
<div id="app">

    <!-- Table -->
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
    <!-- End Table -->

    <!-- Create Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="crear-evaluador">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Crear Evaluador</h4>
                </div>
                <div class="modal-body">
                    <form v-on:submit.prevent="store()">
                        <div class="form-group" :class="{ 'has-error' : errors.name }">
                            <label for="name">Nombre:</label>
                            <input type="text" placeholder="Nombre" class="form-control" v-model="newUser.name" required/>
                            <span class="help-block" v-if="errors.name">@{{errors.name.join()}}</span>
                        </div>
                        <div class="form-group" :class="{ 'has-error': errors.email }">
                            <label for="email">Correo:</label>
                            <input type="email" required="" placeholder="Correo" class="form-control" v-model="newUser.email">
                            <span class="help-block" v-if="errors.email">@{{errors.email.join()}}</span>
                        </div>
                        <div class="form-group" :class="{ 'has-error': errors.password }">
                            <label for="pass">Contraseña:</label>
                            <input type="password" required="" placeholder="Contraseña" class="form-control" v-model="newUser.password">
                            <span class="help-block" v-if="errors.password">@{{errors.password.join(' ')}}</span>
                        </div>
                        <div class="form-group" :class="{ 'has-error': errors.password_confirmation }">
                            <label for="pass">Confirmar Contraseña:</label>
                            <input type="password" required="" placeholder="Confirmar Contraeña" class="form-control" v-model="newUser.password_confirmation">
                            <span class="help-block" v-if="errors.password_confirmation">@{{errors.password_confirmation.join()}}</span>
                        </div>
                        <div class="form-group" :class="{ 'has-error': errors.role }">
                            <label for="rol">Cargo: </label>
                            <select name="rol" id="rol"  class="form-control" v-model="newUser.role" required>
                                <option value="evaluator">Evaluador</option>
                                <option value="admin">Administrador</option>
                            </select>
                            <span class="help-block" v-if="errors.role">@{{errors.role.join()}}</span>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End modal -->

</div>
@endsection

@push('functions')
    <script src="/js/usuarios.js"></script>
@endpush
