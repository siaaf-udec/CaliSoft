<?php
namespace App\Container\Calisoft\Src\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Container\Calisoft\Src\Proyecto;
use App\Container\Calisoft\Src\NomenclaturaBd;
use App\Container\Calisoft\Src\Script;
use App\Container\Calisoft\Src\Documento;
use App\Container\Calisoft\Src\CasoPrueba;
use App\Container\Calisoft\Src\CalificacionBD;
use App\Container\Calisoft\Src\Requests\CalificacionBDRequest;
use Illuminate\Support\Facades\DB;


class EvaluatorController extends Controller
{

    public function categorias()
    {
        return view('calisoft.evaluator.evaluator-categoria');
    }

    public function documentacion(Proyecto $proyecto)
    {
        return view('calisoft.evaluator.evaluator-modelacion', compact('proyecto'));
    }

    public function plataforma(Proyecto $proyecto)
    {
        return view('calisoft.evaluator.evaluator-plataforma', compact('proyecto'));
    }

    public function evaluar(Documento $documento)
    {
        return view('calisoft.evaluator.evaluator-docs', compact('documento'));
    }
    public function codificacion(Proyecto $proyecto)
    {
        return view('calisoft.evaluator.evaluator-codificacion', compact('proyecto'));
    }

    public function evaluarScripts(Script $script)
    {
        return view('calisoft.evaluator.evaluator-scripts',compact('script'));
    }
    public function basedatos(Proyecto $proyecto){
        return view('calisoft.evaluator.evaluator-basedatos',compact('proyecto'));
    }

    public function escenario(Proyecto $proyecto, CasoPrueba $casoPrueba)
    {
        return view('calisoft.evaluator.evaluator-escenario', compact('proyecto','casoPrueba'));
    }

    public function analizesql(Proyecto $proyecto, CalificacionBDRequest $request, CalificacionBD $calificacionbd)
    {
        $nomenclaturabd = NomenclaturaBd::
                    select('tbl_tiponomenclatura.nomenclatura')
                          ->get();
                    
        $palabra_info = "";
        $palabra_infos = "";
        $palabra = "";
        $palabras = "";
        $totalImpostantesBD ="";
        $totalEstandarBD ="";
        $mensajeEncontradas = "Palabras Encontradas: ";
        $mensajePropias = "Palabras Encontradas Propias del SQL: ";
        $mensajeLineas = "Las palabras estan en la linea: ";
        $importantesBD = array('CREATE TABLE', 'PRIMARY KEY', 'FOREIGN KEY', 'klkkñlk', 'jknkjnkjn', 'jnojhojuoi','okjlkjl','kjbkjnkj','kjnkjnj');
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
            $palabra_infos .= $repeticion;
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
            $palabra_info .= $repeticiones; 
            $palabra .= "$k ($repeticiones)<br>"; 

            if(strpos($leerArchivo, $k)> -1)
            {
                $mensajeEncontradas .= $k . ', ';
            }
        }

        echo rtrim("<br>".$mensajeEncontradas, ", ");  

        echo "<br>",$palabra; 

        

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

        // array total en la calificacion
        $total = $palabra_infos[0].$palabra_infos[1];
        $total1 = $palabra_infos[2].$palabra_infos[3];
        $total2 = $palabra_infos[4].$palabra_infos[5];
        $total3 = $palabra_infos[6];
        $total4 = $palabra_infos[7];
        $total5 = $palabra_infos[8];
        $total6 = $palabra_infos[9];
        $total7 = $palabra_infos[10];
        $total8 = $palabra_infos[11];

        // array acertadas en la calificacion
        $acertadas  = $palabra_info[0].$palabra_info[1];
        $acertadas1 = $palabra_info[2].$palabra_info[3];
        $acertadas2 = $palabra_info[4].$palabra_info[5];
        $acertadas3 = $palabra_info[6];
        $acertadas4 = $palabra_info[7];
        $acertadas5 = $palabra_info[8];
        $acertadas6 = $palabra_info[9];
        $acertadas7 = $palabra_info[10];
        $acertadas8 = $palabra_info[11];
        

            $sql = "UPDATE tbl_calificacionbd SET total= ?, acertadas= ?  WHERE FK_TipoNomenclaturaId=? and FK_ArchivoBdId= ?";
            DB::update($sql, array($total, $acertadas,1,  $proyecto->PK_id));

            $sql = "UPDATE tbl_calificacionbd SET total= ?, acertadas= ?   WHERE FK_TipoNomenclaturaId=? and FK_ArchivoBdId= ?";
            DB::update($sql, array($total1, $acertadas1,2,  $proyecto->PK_id));

            $sql = "UPDATE tbl_calificacionbd SET total= ?, acertadas= ?   WHERE FK_TipoNomenclaturaId=? and FK_ArchivoBdId= ?";
            DB::update($sql, array($total2, $acertadas2,3,  $proyecto->PK_id));

            $sql = "UPDATE tbl_calificacionbd SET total= ?, acertadas= ?   WHERE FK_TipoNomenclaturaId=? and FK_ArchivoBdId= ?";
            DB::update($sql, array($total3, $acertadas3,4,  $proyecto->PK_id));

            $sql = "UPDATE tbl_calificacionbd SET total= ?, acertadas= ?   WHERE FK_TipoNomenclaturaId=? and FK_ArchivoBdId= ?";
            DB::update($sql, array($total4, $acertadas4,5,  $proyecto->PK_id));

            $sql = "UPDATE tbl_calificacionbd SET total= ?, acertadas= ?   WHERE FK_TipoNomenclaturaId=? and FK_ArchivoBdId= ?";
            DB::update($sql, array($total5, $acertadas5,6,  $proyecto->PK_id));

            $sql = "UPDATE tbl_calificacionbd SET total= ?, acertadas= ?   WHERE FK_TipoNomenclaturaId=? and FK_ArchivoBdId= ?";
            DB::update($sql, array($total6, $acertadas6,7,  $proyecto->PK_id));

            $sql = "UPDATE tbl_calificacionbd SET total= ?, acertadas= ?   WHERE FK_TipoNomenclaturaId=? and FK_ArchivoBdId= ?";
            DB::update($sql, array($total7, $acertadas7,8,  $proyecto->PK_id));

            $sql = "UPDATE tbl_calificacionbd SET total= ?, acertadas= ?   WHERE FK_TipoNomenclaturaId=? and FK_ArchivoBdId= ?";
            DB::update($sql, array($total8, $acertadas8,9,  $proyecto->PK_id));

            echo $proyecto->sql->url;

          return view('calisoft.evaluator.evaluator-analizesql',compact('proyecto'),[
            'nomenbd' => $nomenclaturabd,
          ])->with('mensajeEncontradas', $mensajeEncontradas)
            ->with('mensajePropias', $mensajePropias)->with('mensajeLineas', $mensajeLineas)
            ->with('palabra_info', $palabra_info)->with('palabra_infos', $palabra_infos)
            ->with('totalImpostantesBD', $totalImpostantesBD)->with('totalEstandarBD', $totalEstandarBD)
            ->with('importantesBD', $importantesBD)->with('estandarBD', $estandarBD)
            ->with('rutaArchivo', $rutaArchivo)->with('rutalecturaArchivo', $rutalecturaArchivo)
            ->with('abrirArchivo', $abrirArchivo)->with('obtenerArchivo', $obtenerArchivo)
            ->with('leerArchivo', $leerArchivo);

         


    }
    
    

}
