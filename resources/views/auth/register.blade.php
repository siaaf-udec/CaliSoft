@extends('layouts.master')

@section('content')
<form role="form" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}

    <div class="form-body">
        <div class="row">
            <div class="col-xs-6">
                <!-- Email Form Group -->
                <div class="form-group form-md-line-input {{$errors->has('email') ? 'has-error' : ''}}">
                    <div class="input-icon">
                        <input class="form-control" id="email" name="email" 
                            type="email" value="{{ old('email') }}" required>
                        <label for="email" class="control-label">Correo:</label>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <i class="fa fa-user"></i>
                    </div>
                </div>
                <!-- End Email Form -->
            </div>
            <div class="col-xs-6">
                @component('components.text', [
                    'name' => 'name',
                    'attributes' => "required",
                    'label' => 'Nombre',
                    'help' => 'Digita el nombre'
                ])
                @endcomponent
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6">
                @component('components.password', [
                    'name' => 'password',
                    'attributes' => "required",
                    'label' => 'Contraseña',
                    'help' => 'Digita la contraseña'
                ])
                @endcomponent
            </div>
            <div class="col-xs-6">
                @component('components.password', [
                    'name' => 'password_confirmation',
                    'attributes' => "required",
                    'label' => 'Confirmar Contraseña',
                    'help' => 'Confirmar la contraseña'
                ])
                @endcomponent
            </div>
        </div>

        <div class="row">
            <div class="text-center">
                <input class="btn green" type="submit" value="Registrarse">
            </div>
        </div>

    </div>
</form>
        

@endsection
