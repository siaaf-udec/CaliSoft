<?php
namespace App\Policies;

use App\Container\Calisoft\Src\User;
use App\Container\Calisoft\Src\Proyecto;
use Illuminate\Auth\Access\HandlesAuthorization;


class ProjectPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can create proyectos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == 'student' && !$user->proyectos()->wherePivot('tipo', 'integrante')->count();
    }

    /**
     * Determine whether the user can update the proyecto.
     *
     * @param  \App\User  $user
     * @param  \App\Proyecto  $proyecto
     * @return mixed
     */
    public function update(User $user, Proyecto $proyecto)
    {
        return $user->proyectos()
            ->wherePivot('tipo', 'integrante')
            ->where('PK_id', $proyecto->PK_id)
            ->where('state', 'creacion')
            ->count() > 0;
    }

    /**
     * Determine whether the user can delete the proyecto.
     *
     * @param  \App\User  $user
     * @param  \App\Proyecto  $proyecto
     * @return mixed
     */
    public function upload(User $user)
    {
        return $user->proyectos()->where('state', 'activo')->count() > 0;
    }
}
