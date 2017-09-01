<?php

namespace App\Container\Calisoft\Src;

use Illuminate\Database\Eloquent\Model;

class CasoPrueba extends Model
{
    protected $table = "TBL_CasoPrueba";
    protected $primaryKey = "PK_id";
    protected $fillable = ['nombre', 'proposito', 'alcance','resultado_esperado','criterios','prioridad',
                            'limite','formulario','observacion','estado','entrega','FK_ProyectoId','FK_UsuarioId'];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'FK_ProyectoId', 'PK_id');
    }

}


