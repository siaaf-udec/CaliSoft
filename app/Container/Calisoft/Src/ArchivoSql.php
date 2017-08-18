<?php

namespace App\Container\Calisoft\Src;

use Illuminate\Database\Eloquent\Model;

class ArchivoSql extends Model
{
    protected $primaryKey = "PK_id";
    protected $tabla = "TBL_ArchivoBd";
    protected $fillable = ['url','FK_ProyectoId','FK_TipoBdId','FK_ReglasId'];

    public function proyecto(){
        return $this->hasOne(Proyecto::class,'FK_ProyectoId','PK_id');
    }
    
    public function tipobd(){
        return $this->hasOne(Tipobd::class,'FK_TipoBdId','PK_id');
    }
}
