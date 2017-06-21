<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'password', 'remember_token',
    ];


    public function home()
    {
        return route($this->role);
    }

    public function goHome()
    {
        return redirect()->route($this->role);
    }
}
