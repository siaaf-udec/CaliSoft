<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    protected $table = "tbl_documentos";
    protected $primaryKey = "PK_id";
    protected $fillable = ['Url','FK_ProyectoId','FK_TipoDocumentoId'];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
