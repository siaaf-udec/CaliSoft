<?php

namespace App\Container\Calisoft\Src\Repositories;

use App\Container\Calisoft\Src\Proyecto;
use App\Container\Calisoft\Src\ItemsCodificacion;
use Illuminate\Support\Collection;


/**
 * Calificaciones generales de los modulos
 * de evaluacion
 */
class Calificaciones
{

    private $proyecto;

    function __construct(Proyecto $proyecto)
    {
        $this->proyecto = $proyecto;
    }

    public function modelacion()
    {
        $documentos = $proyecto->documentos()
            ->with('tipo', 'evaluaciones.componente', 'evaluaciones.evaluador')->get();
        $promediosDeDocumentos = $documentos->map(function ($documento) {
            $evaluacionesPorEvaluador = $documento->evaluaciones->groupBy('evaluador.name');
            $promediosPorEvaluador = $evaluacionesPorEvaluador->map(function ($evaluaciones) {
                return $evaluaciones->avg('checked') * 100;
            });
            return $promediosPorEvaluador->avg();
        });
        $promedioTotal = round($promediosDeDocumentos->avg());
        return $promedioTotal;
    }

    public function plataforma()
    {
        $casos = $this->$proyecto->casoPruebas()->with('pruebas')->get();
        $total = round($casos->avg('calificacion'));
        return $total;
    }

    public function basedatos()
    {

    }

    public function codificacion()
    {
        $promedios=Collect();
        $items=ItemsCodificacion::all()->pluck('item','valor','PK_Id');
        foreach($items as $item){
            $query=$this->query($item);
            $promedios->push(['promedio'=>$query->avg('nota') * $item->valor,
            'prioridad'=>$item->valor
            ]);
        }

    }

    public function total()
    {

    }
    
    public function query($item){
        $query=DB::table('TBL_Proyectos')
        ->join('TBL_Scripts','TBL_Scripts.FK_ProyectoId','=','TBL_Proyectos.PK_Id')
        ->join('TBL_NotaCodificacion','TBL_NotaCodificacion.FK_ScriptsId','=','TBL_Scripts.PK_Id')
        ->join('TBL_ItemsCodificacion','TBL_NotaCodificacion.FK_ItemsId','=','TBL_ItemsCodificacion.PK_Id')
        ->select('TBL_Proyectos.PK_Id','TBL_NotaCodificacion.nota','TBL_ItemsCodificacion.item','TBL_ItemsCodificacion.valor','TBL_NotaCodificacion.total')
        ->where('TBL_NotaCodificacion.total','<>','0')
        ->where('TBL_Proyectos.PK_id','=', $proyecto->PK_id)
        ->where('TBL_NotaCodificacion.FK_ItemsId','=',$item->PK_id)
        ->get();

        return $query;
    }
}