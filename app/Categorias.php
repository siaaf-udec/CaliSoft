<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $primaryKey = "PK_id";
    protected $table="TBL_Categorias";
    protected $fillable = ['plataforma','modelado','clases','uso','despliegue','secuencia','actividades','entidad_relacion'];
}
