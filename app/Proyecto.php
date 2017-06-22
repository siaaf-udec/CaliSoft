<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use Notifiable;

    protected $table = "TBL_Proyectos";
    protected $primaryKey = "PK_id";

    protected $fillable = [
        'nombre', 'FK_GrupoDeInvestigacionId', 'FK_SemilleroId','FK_CategoriaId',
    ];
}
