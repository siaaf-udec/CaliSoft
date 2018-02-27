<?php

namespace App\Container\Calisoft\Src\Repositories;

use App\Container\Calisoft\Src\Proyecto;

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

    }

    public function total()
    {

    }
}