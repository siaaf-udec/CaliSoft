<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $primaryKey = "PK_id";
    protected $table="TBL_Categorias";
    protected $fillable = ['nombre','plataforma','modelado','clases','uso','despliegue','sequencia','actividades','entidad_relacion'];
}
