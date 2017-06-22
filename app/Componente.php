<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{

    protected $table = "TBL_ComponentesDocumento";
    protected $primaryKey = "PK_id";

    protected $fillable = ['nombre', 'required', 'descripcion', 'FK_TipoDocumentoId'];

    public function documento(){
        return $this->belongsTo(TiposDocumento::class, 'FK_TipoDocumentoId', 'PK_id');
    }
}
