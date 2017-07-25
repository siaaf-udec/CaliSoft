@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
    @component('components.portlet', ['icon' => 'fa fa-user', 'title' => 'Perfil'])
        <div id="app" class="row">
            <div class="col-md-4">
                <div class="portlet light profile-sidebar-portle">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="../assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">

                      </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> {{auth()->user()->name}}  </div>
                        <div class="profile-usertitle-job"> {{auth()->user()->role}} </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                </div>
            </div>

            <div class="col-md-8">
                <div class="profile-content">

                    <div class="portlet-title tabbable-line">

                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1_1" data-toggle="tab">Información Personal</a>
                            </li>
                            <li>
                                <a href="#tab_1_2" data-toggle="tab">Cambiar Foto data</a>
                            </li>
                            <li>
                                <a href="#tab_1_3" data-toggle="tab">Cambiar Contraseña</a>
                            </li>


                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <!-- PERSONAL INFO TAB -->
                            <div class="tab-pane active" id="tab_1_1">
                                <form action="#" method="POST" >
                                    {{csrf_field()}}
                                   <input type="hidden" name="PK_id" value="{{ auth()->id() }}">

                                    @component('components.text', [
                                    'name' => 'name',
                                    'attributes' => "required",
                                    'label' => 'Nombre',
                                    'help' => 'Cambiar el Nombre',
                                    'icon' => 'fa fa-user',
                                    'value'=> old('name') ?: auth()->user()->name,
                                    ])
                                    @endcomponent
                                     @component('components.email', [
                                    'name' => 'email',
                                    'attributes' => "required",
                                    'label' => 'Correo',
                                    'help' => 'Cambiar El Correo',
                                    'icon' => 'fa fa-envelope-o',
                                    'value'=> old('email') ?: auth()->user()->email,
                                    ])
                                    @endcomponent


                                        <div class="form-group">
                                        <button type="submit" class="btn blue center-block">Guardar Cambios</button>
                                        </div>


                                </form>
                                @if(session()->has('mensaje'))
                                <div class="alert alert-info alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <strong>{{session('mensaje')}}</strong>
                                </div>
                                @endif
                              </div>

                            <!-- END PERSONAL INFO TAB -->
                            <!-- CHANGE AVATAR TAB -->
                            <div class="tab-pane" id="tab_1_2">
                                <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. </p>
                                <form action="#" role="form">
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                                                    <span class="fileinput-new"> Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="file" name="..."> </span>
                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                        <div class="clearfix margin-top-10">
                                            <span class="label label-danger">NOTE! </span>
                                            <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                        </div>
                                    </div>
                                    <div class="margin-top-10">
                                        <a href="javascript:;" class="btn green"> Submit </a>
                                        <a href="javascript:;" class="btn default"> Cancel </a>
                                    </div>
                                </form>
                            </div>
                            <!-- END CHANGE AVATAR TAB -->
                            <!-- CHANGE PASSWORD TAB -->
                            <div class="tab-pane" id="tab_1_3">
                                <form action="{{route('perfil.password')}}" method="POST">
                                  {{csrf_field()}}
                                    @component('components.password',[
                                      'name'=>'PassActual',
                                      'attributes'=>'required',
                                      'label' => 'Contraseña Actual',
                                      'help' => 'Digite Contraseña Actual',
                                      'icon' => 'fa fa-key',
                                    ])
                                    @endcomponent
                                    @component('components.password',[
                                      'name'=>'PassNew',
                                      'attributes'=>'required',
                                      'label' => 'Contraseña Nueva',
                                      'help' => 'Digite Contraseña Nueva',
                                      'icon' => 'fa fa-key',
                                    ])
                                    @endcomponent
                                    @component('components.password',[
                                      'name'=>'PassConfir',
                                      'attributes'=>'required',
                                      'label' => 'Confirmar Contraseña',
                                      'help' => 'Digite para Confirmar Contraseña',
                                      'icon' => 'fa fa-key',
                                    ])
                                    @endcomponent

                                    <div class="margin-top-10">
                                        <button type="submit" class="btn green-jungle">
                                         <i class="fa fa-edit"></i>Editar Contraseña
                                        </button>
                                        <a href="javascript:;" class="btn default"> Cancelar </a>
                                    </div>
                                </form>
                            </div>
                            <!-- END CHANGE PASSWORD TAB -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endcomponent
    </div>
@endsection

@push('styles')
    <link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
@endpush
