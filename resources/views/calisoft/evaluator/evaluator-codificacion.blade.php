@extends('layouts.dash')

@section('content')

        <div class="col-md-12">
            @component('components.portlet', [
            'icon' => 'fa fa-files-o', 
            'title' => 'Codificación: ' . $proyecto->nombre 
        ])
             <div id="app">
            <div class="row">


                    <div class="col-sm-4 col-xs-12">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="" class="control-label col-xs-4">Mostrar</label>
                                <div class="col-xs-4 col-sm-5">
                                    <select  class="form-control" v-model="paginator.show">
                                        <option value="5">5</option>
                                        <option value="10" selected>10</option>
                                        <option value="15">15</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
            

                <div class="col-sm-offset-4 col-sm-4 col-xs-12" style="margin-bottom: 2%">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar" v-model="search">
                        <span class="input-group-addon">
                        <i class="glyphicon glyphicon-search"></i>
                        </span>
                    </div>
                </div>
            </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%">
                        <thead>
                            <th class="text-center">Nombre Del Archivo</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Operaciones</th>
                        </thead>
                        <tbody >
                            <tr v-for="script in paginator.items" class="text-center">
                                <td v-text="script.url"></td>
                                <td v-text="script.estado"></td>
                                <td class="text-center">
                                    <button class="btn yellow-crusta" title="Calificar" >
                                        <span class="fa fa-asterisk"></span>
                                    </button>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">

                    <!-- Pagination Buttons-->
                    <div class="col-sm-6 text-right" v-show="paginator.lastPage > 1">
                        <pagination v-model="paginator.page" :total-page="paginator.lastPage" boundary-links></pagination>
                    </div>
                    <!-- End Pagination Buttons-->
                </div>

            </div>
                
            @endcomponent  
        </div>
@endsection
@push('functions')
    <script src="/assets/global/plugins/jquery.media.js"></script>
    <script src="/js/codificacion.js"></script>
@endpush