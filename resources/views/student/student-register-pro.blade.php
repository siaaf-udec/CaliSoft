@extends('layouts.student-dash')

@section('content')
    <div id="app">
      <form v-on:submit.prevent="store()">
        <div class="form-body" style='width: 80%; margin-left : 5% ' >
            <div class="form-group form-md-line-input" >
                <label for="nomProyecto" class="control-label">Nombre Proyecto:</label>
                <input class="form-control" id="nomProyecto" v-model="proyecto.nombre"></input>
            </div>
            <div class="form-group form-md-line-input col-md-4" >
                <label for="Categorias" class="control-label">Categoria: </label>
                <select class="form-control" id="categorias"   v-model="proyecto.FK_categoria" >
                   <option v-for=" categoria in categorias " v-bind:value="categoria.PK_id"> @{{ categoria.nombre }}  </option>
                </select>   
            </div>
            <div class="form-group form-md-line-input col-md-4" >
                 <label for="semilleros" class="control-label">Semillero: </label> 
                 <select class="form-control" id="semilleros"  v-model="proyecto.FK_semillero">
                   <option v-for=" semillero in semilleros " v-bind:value="semillero.PK_id"> @{{ semillero.nombre }}  </option>
                </select>   
            </div>
            <div class="form-group form-md-line-input col-md-4" >
                 <label for="grupos" class="control-label">Grupo de investigacion: </label>
                 <select class="form-control" id="grupos"  v-model="proyecto.FK_grupo">
                   <option v-for=" grupo in grupos " v-bind:value="grupo.PK_id"> @{{ grupo.nombre }}  </option>
                </select>
            </div>
            <br>
            <br>
            <div class="form-actions" style="margin-top: 15%;">
                  <input class="btn btn-success uppercase pull-left" type="submit" value="Enviar">
            </div>    
        </div>  
      </form>
    </div>
@endsection 
@push('functions')
    <script src="/js/proyectos.js"></script>
@endpush
