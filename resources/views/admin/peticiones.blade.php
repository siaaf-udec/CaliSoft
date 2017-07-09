@extends('layouts.admin-dash')

@section('content')

    <div class="col-md-12">
        @component('components.portlet', ['icon' => 'fa fa-book', 'title' => 'Documentos'])
            <div id="app">
               <h2> PETICIONES</h2>
                <br>
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <h4>LISTADO DE PROYECTOS EN PROPUESTA</h4>
                    </div>
                    <div class="panel-body">
                    

                        <!-- BEGIN Portlet PORTLET-->
                            <div class="portlet box red-sunglo" v-for="peticion in peticiones">
                                <div class="portlet-title">
                                    <div class="caption" v-text="peticion.nombre" >
                                        <i class="fa fa-gift"></i ></div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                        <a href="" class="fullscreen"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="col-md-12">    
                                        <div class="profile-sidebar">
                                            <div class="portlet light profile-sidebar-portlet ">
                                                <!-- SIDEBAR USERPIC -->
                                                <div class="profile-userpic">
                                                <img src="../assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""> </div>
                                                <!-- END SIDEBAR USERPIC -->
                                                <!-- SIDEBAR USER TITLE -->
                                            <div class="profile-usertitle">
                                                <div class="profile-usertitle-name"> Marcus Doe </div>
                                                <div class="profile-usertitle-job"> Developer </div>
                                            </div>
                                    <!-- END SIDEBAR USER TITLE -->
                                        </div>
                                        </div>

                                    </div>

                                    <p>
                                        <strong>Scroll is hidden</strong>
                                        <br/> Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula,
                                        eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit
                                        amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. </p>


                                    
                            </div>
                            <!-- END Portlet PORTLET-->


                    
                    </div>
                </div>
            </div>
        @endcomponent
    </div>

</div>
@endsection

@push('styles')
    <link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/global/plugins/bootstrap-toastr/toastr.min.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
        
@endpush

@push('functions')
    <script src="../assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
    <script src="/js/peticiones.js"></script>
@endpush



@push('plugins')
    <script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/bootstrap-selectsplitter/bootstrap-selectsplitter.min.js" type="text/javascript"></script>
     <script src="../assets/pages/scripts/components-bootstrap-select-splitter.min.js" type="text/javascript"></script>

@endpush
