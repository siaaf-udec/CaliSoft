<?php
namespace App\Container\Calisoft\Src\Repositories;

use App\Container\Calisoft\Src\Documento;

class Evaluations
{
    /**
     * Retorna las Evaluaciones del documento
     *
     * @param Document $documento
     * @param integer $evaluatorId
     * @return Collection Coleccion de evaluaciones
     */
    public function forDocument(Documento $documento, $evaluatorId)
    {
        //mapea los componentes del tipo de documento a evaluaciones
        return $documento->tipo->componentes->map(
            function ($componente) use ($evaluatorId, $documento) {

                //consulta o crea la evaluacion
                return $documento->evaluaciones()->firstOrCreate([
                    'FK_ComponenteId' => $componente->PK_id,
                    'FK_EvaluatorId' => $evaluatorId,
                    'FK_DocumentoId' => $documento->PK_id
                ]);

            }
        )->load('componente'); //carga los componentes a las evaluaciones




    }

}