{{--
|--------------------------------------------------------------------------
| Extends
|--------------------------------------------------------------------------
|
| Hereda los estilos y srcipts de la de la plantilla original.
| Es la base para todas las páginas que se deseen crear.
|
--}}
@extends('layouts.master')

{{--
|--------------------------------------------------------------------------
| Styles
|--------------------------------------------------------------------------
|
| Inyecta CSS requerido ya sea por un JS o para un elemento específico
|
| @push('styles')
|
| @endpush
--}}
@push('styles')
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{ asset('assets/pages/css/login-5.min.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->
@endpush


{{--
|--------------------------------------------------------------------------
| Title
|--------------------------------------------------------------------------
|
| Inyecta el título de la página a la etiqueta <title></title> de la plantilla
| Recibe texto o variables de los controladores
| Sin embargo, también se puede usar de la siguiente forma
|
| @section('title', $miVariable)
| @section('title', 'Título')
--}}
@section('title', '| Login')

{{--
|--------------------------------------------------------------------------
| Content
|--------------------------------------------------------------------------
|
| Inyecta el contenido HTML que se usará en la página
|
| @section('content')
|
| @endsection
--}}
@section('content')
    <!-- BEGIN : LOGIN PAGE 5-1 -->
    <div class="user-login-5">
        <div class="row bs-reset">
            <div class="col-md-6 bs-reset mt-login-5-bsfix">
                <div class="login-bg" style="background-image:url({{ asset('assets/pages/img/login/bg1.jpg') }})">
                    <img class="login-logo" src="{{ asset('assets/pages/img/login/siaaf.png') }}" /> 
                </div>
            </div>
            <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
                <div class="login-content">
                    <h1>{{ $title or config('app.name') }}</h1>
                    <p> {{ $description or config('app.description') }} </p>
                    
                    <form action="{{ route('login') }}" id="form-login" role="form" method="post" novalidate>
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    @component('components.email', [
                                        'name' => 'email',
                                        'attributes' => "required autofocus",
                                        'label' => 'Correo',
                                        'help' => 'Digita el correo'
                                    ])
                                    @endcomponent
                                </div>
                                <div class="col-xs-6">
                                    @component('components.password', [
                                        'name' => 'password',
                                        'attributes' => "required",
                                        'label' => 'Contraseña',
                                        'help' => 'Digita la contraseña'
                                    ])
                                    @endcomponent
                                </div>
                            </div>
                        </div>

                        
                     
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="rem-password">
                                    @component('components.checkbox', [
                                        'name' => 'remember',
                                        'label' => 'Recordarme'
                                    ])
                                    @endcomponent
                                    
                                    <div class="row text-danger text-center">
                                        @foreach($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 text-right">
                                <input class="btn green" type="submit" value="Ingresar">
                            </div>
                            <div class="col-sm-12 text-right">
                                <div class="forgot-password">
                                    <a href="javascript:;" id="forget-password" class="forget-password">
                                        ¿Se te olvidó tu contraseña?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END : LOGIN PAGE 5-1 -->

                    <!-- BEGIN FORGOT PASSWORD FORM -->
                    <form action="{{ route('password.request') }}" id="form-forget" role="form" novalidate method="POST" class="forget-form">
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
                </div>
                <div class="login-footer">
                    <div class="row bs-reset">
                        <div class="col-xs-5 bs-reset">
                            <ul class="login-social">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-social-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-social-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-social-dribbble"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-7 bs-reset">
                            <div class="login-copyright text-right">
                                <p>Copyright © {{ $footer or config('app.author') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| Inyecta scripts necesarios para usar plugins
| > Tablas
| > Checkboxes
| > Radios
| > Mapas
| > Notificaciones
| > Validaciones de Formularios por JS
| > Entre otros
| @push('functions')
|
| @endpush
--}}

@push('plugins')
<script src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
{{-- <script src="{{ asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script> --}}
{{-- <script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script> --}}
<script src="{{ asset('assets/global/plugins/backstretch/jquery.backstretch.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/global/plugins/jquery-validation/js/localization/messages_es.js') }}" type="text/javascript"></script>
{{-- <script src="{{ asset('assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script> --}}

<script src="{{ asset('assets/pages/scripts/login-5.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/main/scripts/form-validation-md.js') }}" type="text/javascript"></script>
@endpush

{{--
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| Inyecta scripts para inicializar componentes Javascript como
| > Tablas
| > Checkboxes
| > Radios
| > Mapas
| > Notificaciones
| > Validaciones de Formularios por JS
| > Entre otros
| @push('functions')
|
| @endpush
--}}
@push('functions')
    <script type="text/javascript">
        var rules = {
            email: { email: true, required: true },
        };
        var messages = { };
        var form = $('#form-forget');
        jQuery(document).ready(function() {
            FormValidationMd.init(form, rules, messages);
        });
    </script>
@endpush