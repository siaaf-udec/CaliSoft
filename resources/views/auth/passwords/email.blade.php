@extends('layouts.master')

@section('content')
<!-- BEGIN FORGOT PASSWORD FORM -->
    <form action="{{ route('password.email') }}" method="POST" class="forget-form">
        {{ csrf_field() }}
        <h3 class="font-green">¿Se te olvidó tu contraseña ?</h3>

        <p>Introduzca su dirección de correo electrónico a continuación para restablecer su contraseña. </p>
        @component('components.email', [
            'name' => 'email',
            'attributes' => 'required autofocus autocomplete=off',
            'label' => 'Correo',
            'help' => 'Digita el correo'
        ])
        @endcomponent
        <div class="form-actions">
            <button id="back-btn" class="btn green btn-outline" type="button">Cancelar</button>
            <input class="btn btn-success uppercase pull-right" type="submit" value="Enviar">
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
</form>
        

@endsection
