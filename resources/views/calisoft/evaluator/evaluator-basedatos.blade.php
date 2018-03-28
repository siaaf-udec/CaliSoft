@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', [
            'icon' => 'fa fa-files-o', 
            'title' => 'Nomenclatura: ' . $proyecto->nombre
            ])
            <div id="app">
                <div class="row">
                    <div class="col-md-6">
                        <h5><center><strong>Codigo SQL</strong></center></h5>
                        <code-preview url="{{$proyecto->sql->url}}" prefix="/api/sql/preview/" mode="text/x-sql"></code-preview>                  
                    </div>
                    <div class="col-md-6">
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn green-jungle center-block" data-toggle="modal" data-target="#ModalAutomatica">Calificación Automática <i class="fa fa-arrow-circle-right"></i></button>

                            <!-- Modal -->
                            <div id="ModalAutomatica" class="modal fade" data-backdrop="static" data-keyboard="false" role="dialog">
                            <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title" align="center">Calificación Nomenclatura Base de datos - Proyecto: "{{$proyecto->nombre}}" </h4>
                                </div>
                                <div class="modal-body" >
                                <?php
                                $palabra_info = "";
                                $palabra_infos = "";
                                $palabra = "";
                                $palabras = "";
                                $totalImpostantesBD ="";
                                $totalEstandarBD ="";
                                $mensajeEncontradas = "Palabras Encontradas: ";
                                $mensajePropias = "Palabras Encontradas Propias del SQL: ";
                                $mensajeLineas = "Las palabras estan en la linea: ";
                                $importantesBD = array('BASE DATOS','CREATE SCHEMA', 'CREATE TABLE', 'VIEWS', 'PRIMARY KEY', 'FOREIGN KEY', 'klkkñlk', 'jknkjnkjn', 'jnojhojuoi');
                                $estandarBD = array();

                                foreach($nomenclaturabd as $nomenbds)
                                {
                                    $estandarBD[] = $nomenbds->nomenclatura;
                                }

                                $rutaArchivo = storage_path() . "/app/uploads/sql/".$proyecto->sql->url;
                                $rutalecturaArchivo = file($rutaArchivo);
                                $abrirArchivo=fopen($rutaArchivo, "r+");

                                $obtenerArchivo = fgets($abrirArchivo);
                                $leerArchivo = fread($abrirArchivo, 350000);

                                foreach ($importantesBD as $i) 
                                {

                                    $repeticion = substr_count($leerArchivo, $i); 
                                    $totalImpostantesBD += substr_count($leerArchivo, $i); 
                                    $palabra_infos .= "$repeticion,";
                                    $array = explode(",", $palabra_infos);
                                    $palabras .= "$i ($repeticion)<br>";
                            
                                    if(strpos($leerArchivo, $i)> -1)
                                    {
                                    $mensajePropias .= $i . ', ';
                                    }

                                }

                                echo rtrim($mensajePropias, ", ");

                                echo "<br>",$palabras,"<br>"; 

                                echo "Total Palabras Propias del SQL: ".$totalImpostantesBD, "<br>";

                                foreach ($estandarBD as $k) 
                                {

                                    $repeticiones = substr_count($leerArchivo, $k); 
                                    $totalEstandarBD += substr_count($leerArchivo, $k);
                                    $palabra_info .= "$repeticiones,"; 
                                    $array1 = explode(",", $palabra_info);
                                    $palabra .= "$k ($repeticiones)<br>"; 

                                    if(strpos($leerArchivo, $k)> -1)
                                    {
                                        $mensajeEncontradas .= $k . ', ';
                                    }
                                }

                                echo rtrim("<br>".$mensajeEncontradas, ", ");  

                                echo "<br>",$palabra; 

                                

                                echo "<br>Total Palabras Estandar Encontradas: ".$totalEstandarBD, "<br>";

                                /*$pos = 1;

                                foreach($rutalecturaArchivo as $linea)
                                {
                                    for ( $x = 0; $x < count ( $importantesBD ); $x++ )
                                    {
                                        if (strstr($linea,$importantesBD[$x]))
                                        {
                                                    echo "<br> si esta la palabra $linea, está en la linea : ".$pos." <br>";
                                        }
                                            $pos++;
                                    }
                                }*/
                                ?>
                                </div>
                                <div class="modal-footer">
                                    <a href="/proyectos/{{$proyecto->PK_id}}/basedatos"><button type="button"  class="btn green-jungle center-block">
                                    <i class="fa fa-arrow-circle-right"></i>
                                    Calificación Automatica
                                </button></a> 
                                </div>
                                </div>

                            </div>
                            </div>
                        <h5><center><strong>Información</strong></center></h5>
                        <tabla-componente :read="false"></tabla-componente>  
                        <form method="POST" action="{{route('observacion-bd',['sql'=>$proyecto->sql->PK_id])}}">
                            {{csrf_field()}}               
                                    @component('components.textarea',[
                                        'name'=>'observacion',
                                        'attributes'=>'required',
                                        'label'=>'Comentario',
                                        'value'=>$proyecto->sql->observacion,
                                    ])
                                    @endcomponent
                            <button type="submit"  class="btn green-jungle center-block">
                            <i class="fa fa-edit"></i> Aceptar Calificación</button>
                        </form>   
                        
                                             
                    </div>
                </div>
                @include('partials.modal-help-calificar-bd')
            </div>                
        @endcomponent  
    </div>
@endsection
@push('functions')
    <script>window.archivoId = "{{ $proyecto->sql->PK_id }}"</script>
    <script src="/assets/global/plugins/jquery.media.js"></script>
    <script src="/js/base-datos.js"></script>
@endpush