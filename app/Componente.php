<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{

    $table = "TBL_ComponentesDocumento";
    $primaryKey = "PK_id";

    $fillable = ['nombre', 'required', 'descripcion', 'FK_TipoDocumentoId'];

    public function documento(){
        return $this->belongsTo(TiposDocumento::class, 'FK_TipoDocumentoId', 'PK_id');
    }
}
