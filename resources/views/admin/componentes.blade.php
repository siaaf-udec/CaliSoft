@extends('layouts.admin-dash')


@section('content')
    <div id="app">
    
       <h2> {{ $documento->nombre }}</h2>
    

        <form @submit.prevent='store()'>
            <div class="form-group">
                <label for="title">Nombre del Componente</label>
                <input type="text" name="nombre" class="form-control" v-model="newComponente.nombre" required="" />                    
            </div>
            <!--                
            <div class="form-group">
                <label for="title">Obligatorio</label>
                <input type="num" name="required" class="form-control" v-model="newComponente.required"/>
                                    
            </div> -->
            <div class="form-group">
                <label for="title">Descripción</label>
                <input type="text" name="descripcion" class="form-control" v-model="newComponente.descripcion" required="" />
                                   
            </div>

             <button type="submit" class="btn btn-success">Crear</button>
                                                   
    </form>

    
    </div>


@endsection


@push('functions')
    <script>
        window.documentId = {{ $documento->PK_id }};
    </script>
    <script src="/js/componentes.js"></script>
@endpush
