<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Proyecto extends Model
{
    use Notifiable;

    protected $table = "TBL_Proyectos";
    protected $primaryKey = "PK_id";

    protected $fillable = [
        'nombre', 'FK_GrupoDeInvestigacionId', 'FK_SemilleroId','FK_CategoriaId',
    ];

    public function users(){
        return $this->belongsToMany('App\User','TBL_ProyectosAsignados','FK_ProyectoId','FK_UsuarioId')
        ->withTimestamps();
    }

    public function documentos(){
        return $this->hasMany(Documentos::class, 'FK_ProyectoId', 'PK_id');
    }
}
