<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Proyecto;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "TBL_Usuarios";
    protected $primaryKey = "PK_id";

    /**
     *  Roles de el usuario
     * @var array
     */
    const ROLES = ['admin', 'student', 'evaluator'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'pivot'
    ];


    /**
     * Retorna la url del dash del usuario
     *
     * @return string
     */
    public function home()
    {
        return route($this->role);
    }

    /**
     * Redireciona dash del usuario
     *
     * @return Response
     */
    public function goHome()
    {
        return redirect()->route($this->role);
    }


    /**
     * Relacion integrante -> proyecto
     */
    public function proyecto(){
        return $this->belongsTo(Proyecto::class, 'FK_ProyectoId', 'PK_id');
    }

    /**
     * Relacion evaluador -> proyectos asignados
     */
    public function proyectosAsignados(){
        return $this->belongsToMany(Proyecto::class, 'TBL_ProyectosAsignados',
            'FK_UsuarioId', 'FK_ProyectoId')->withTimestamps();
    }

    public function invitaciones(){
        return $this->belongsToMany(Proyecto::class, 'TBL_Invitaciones',
            'FK_UsuarioId', 'FK_ProyectoId')->withTimestamps();
    }

    public function scopeFreeStudents($query){
        return $query->where('role', 'student')->whereNull('FK_ProyectoId');
    }

}
