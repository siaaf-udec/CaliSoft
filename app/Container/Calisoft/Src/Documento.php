<?php

namespace App\Container\Calisoft\Src;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = "TBL_Documentos";
    protected $primaryKey = "PK_id";
    protected $fillable = ['url','FK_ProyectoId','FK_TipoDocumentoId'];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function tipo()
    {
        return $this->belongsTo(TiposDocumento::class, 'FK_TipoDocumentoId', 'PK_id');
    }

    public function proyecto()
    {
        return $this->belongsTo(proyecto::class, 'FK_ProyectoId', 'PK_id');
    }
}
