@extends('layouts.student-dash')

@section('content')
    

    <div class="form-group row add" >
    <div class="col-md-12">
            <h3 class="text-center">PORCENTAJES</h3>
    </div>
    </div>
       
    <div id="app">
    <div class="table-responsive">
    <table class="table table-striped table-hover table-bordered table-condensed">
        <thead>
            <th>Nombre</th>
            <th>Plataforma</th>
            <th>Modelado</th>
            <th>Despliegue</th>
            <th>Entidad/relación</th>
            <th>Clases</th>
            <th>Actividades</th>
            <th>secuencia</th>
            <th>Uso</th>
            
        </thead>
        <tbody>
            <tr v-for="categoria in categorias">
                <td v-text="categoria.nombre"></td>
                <td v-text="categoria.plataforma"></td>
                <td v-text="categoria.modelado"></td>
                <td v-text="categoria.despliegue"></td>
                <td v-text="categoria.entidad_relacion"></td>
                <td v-text="categoria.clases"></td>
                <td v-text="categoria.actividades"></td>
                <td v-text="categoria.sequencia"></td>
                <td v-text="categoria.uso"></td>
               
            </tr>
        </tbody>
    </table>
    </div>
    
</div>

<div class="form-group row add" >
    <div class="col-md-12">
            <h3 class="text-center">PORCENTAJES DE EVALUACION (PLATAFORMA Y MODELADO)</h3>
            <h4 class="text-justify">Los porcentajes de evaluación se configuran de manera que se le da un porcentaje a la evaluación de la plataforma y a la evaluación de modelado, de manera que si equivalen lo mismo cada uno tendrá un porcentaje de 50% y 50%, en caso de que la evaluación de la plataforma sea más importante se le agregara un porcentaje mayor y se les restará a la evaluación del modelado respectivamente y viceversa.</h4>

            <h3 class="text-center">PORCENTAJES DE EVALUACION DEL MODELADO</h3>
            <h4 class="text-justify">En esta parte de la configuración de los porcentajes se busca dar un valor a cada uno de los diagramas, el total de los porcentajes deben sumarme el 100%.</h4>
    </div>
    </div>

@endsection 
@push('functions')
    <script src="/js/categorias.js"></script>
@endpush