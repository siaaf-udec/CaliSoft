<?php

namespace App\Container\Calisoft\Src;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

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
        'password', 'remember_token'
    ];


    /**
     * Retorna la url del dash del usuario
     *
     * @return string
     */
    public function home()
    {
        return route($this->roles()->first()->name);
    }

    /**
     * Redireciona dash del usuario
     *
     * @return Response
     */
    public function goHome()
    {
        return redirect()->route($this->roles()->first()->name);
    }

    /**
     * Relacion evaluador -> proyectos asignados
     */
    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class, 'TBL_ProyectosAsignados', 'FK_UsuarioId', 'FK_ProyectoId')
            ->withPivot('tipo')
            ->withTimestamps();
    }
}
