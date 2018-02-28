<?php

namespace App\Container\Calisoft\Src\Repositories;

use App\Container\Calisoft\Src\Proyecto;
use App\Container\Calisoft\Src\ItemsCodificacion;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


/**
 * Calificaciones generales de los modulos
 * de evaluacion
 */
class Calificaciones
{

    private $proyecto;

    function __construct(Proyecto $proyecto = null)
    {
        $this->proyecto = $proyecto;
    }

    public function modelacion($documentos)
    {   
        $documentos = $documentos ?: $this->$proyecto->documentos()
            ->with('tipo', 'evaluaciones.componente', 'evaluaciones.evaluador')->get();
        $total = $documentos
            ->filter(function ($doc) {
                return $doc->evaluaciones->count() && $doc->tipo->required;
            })
            ->map(function ($doc) {
                return $doc->evaluaciones->avg('checked');
            })
            ->avg() * 100;
        return round($total);
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
        $items=ItemsCodificacion::all();
        foreach($items as $item){
            $query=$this->query($item);
            $promedios->push(['promedio'=>$query->avg('nota') * $item->valor,
            'prioridad'=>$item->valor
            ]);
           
        }
        $numerador=$promedios->sum('promedio');
        //denominador
        $denominador=$promedios->groupBy('prioridad');
        $denominador=$denominador->map(function($item,$key){
            return collect($item)->count()*$key;

        });
        $denominador=$denominador->sum();
        //ecuacion final
        return $numerador/$denominador;
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
        ->where('TBL_Proyectos.PK_id','=', $this->proyecto->PK_id)
        ->where('TBL_NotaCodificacion.FK_ItemsId','=',$item->PK_id)
        ->get();

        return $query;
    }
}