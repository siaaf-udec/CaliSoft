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

    protected $hidden = ['pivot'];

    protected $fillable = [
        'nombre', 'FK_GrupoDeInvestigacionId', 'FK_SemilleroId','FK_CategoriaId',
    ];

   
    public function integrantes(){
        return $this->hasMany(User::class, 'FK_ProyectoId', 'PK_id');
    }


    public function evaluadores(){
        return $this->belongsToMany(User::class, 'TBL_ProyectosAsignados', 
            'FK_ProyectoId', 'FK_UsuarioId')->withTimestamps();
    }


    public function documentos(){
        return $this->hasMany(Documentos::class, 'FK_ProyectoId', 'PK_id');
    }

    public function semillero(){
        return $this->belongsTo(Semillero::class, 'FK_SemilleroId');
    }

    public function categoria(){
        return $this->belongsTo(Categorias::class, 'FK_CategoriaId');
    }

    public function grupoDeInvestigacion(){
        return $this->belongsTo(GrupoDeInvestigacion::class, 'FK_GrupoDeInvestigacionId');
    }
}
