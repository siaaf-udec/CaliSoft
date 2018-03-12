@extends('layouts.dash')

@section('content')
    <div class="col-md-12">
        @component('components.portlet', [
            'icon' => 'fa fa-files-o', 
            'title' => 'Nomenclatura: ' . $proyecto->nombre
            ])
            <div id="app">
                <div class="row">
                    <div class="col-md-12">

                    <?php
                        $palabra_info = "";
                        $palabra_infos = "";
                        $totalImpostantesBD ="";
                        $totalEstandarBD ="";
                        $importantesBD = array('CREATE TABLE', 'PRIMARY KEY', 'FOREIGN KEY');

                        $estandarBD = array();
                          foreach($nomenbd as $nomenbds){
              
                            $estandarBD[] = $nomenbds->nomenclatura;
              
                          }
                       
                        $rutaArchivo=  "{$proyecto->sql->url}";
                        $rutalecturaArchivo = file($rutaArchivo);
                        $abrirArchivo=fopen($rutaArchivo, "r+");
                        $mensajeEncontradas = "Palabras Encontradas: ";
                        $mensajePropias = "Palabras Encontradas Propias del SQL: ";
                        $mensajeLineas = "Las palabras estan en la linea: ";

                        $obtenerArchivo = fgets($abrirArchivo);
                        $leerArchivo = fread($abrirArchivo, 350000);
                        
                        foreach ($importantesBD as $i) 
                        {

                            $repeticion = substr_count($leerArchivo, $i); 
                            $totalImpostantesBD += substr_count($leerArchivo, $i); 
                            $palabra_infos .= "$i ($repeticion)<br>";

                            if(strpos($leerArchivo, $i)> -1)
                            {
                            $mensajePropias .= $i . ', ';
                            }

                        }

                        echo rtrim($mensajePropias, ", ");

                        echo "<br>",$palabra_infos,"<br>"; 

                        echo "Total Palabras Propias del SQL: ".$totalImpostantesBD, "<br>";


                        foreach ($estandarBD as $k) 
                        {

                            $repeticiones = substr_count($leerArchivo, $k); 
                            $totalEstandarBD += substr_count($leerArchivo, $k); 
                            $palabra_info .= "$k ($repeticiones)<br>"; 

                            if(strpos($leerArchivo, $k)> -1)
                            {
                                $mensajeEncontradas .= $k . ', ';
                            }
                        }

                        echo rtrim("<br>".$mensajeEncontradas, ", ");  

                        echo "<br>",$palabra_info; 

                        echo "<br>Total Palabras Estandar Encontradas: ".$totalEstandarBD, "<br>";

                        $pos = 1;

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
                        }
             ?>

                    </div>
                </div>
            </div>                
        @endcomponent  
    </div>
@endsection
@push('functions')
    <script>window.archivoId = "{{ $proyecto->sql->PK_id }}"</script>
    <script src="/assets/global/plugins/jquery.media.js"></script>
    <script src="/js/base-datos.js"></script>
@endpush