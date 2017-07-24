<?php

namespace App\Container\Calisoft\Src\Repositories;

use App\Container\Calisoft\Src\User;

class Users
{
    public function searchFreeStudents($name)
    {
        return User::whereDoesntHave('proyectos', function ($query) {
            $query->where('tipo', '<>', 'invitado');
        })
        ->where('role', 'student')
        ->where('name', 'like', "%$name%")
        ->limit(10)
        ->get();
    }

    public function searchEvaluators($name){
        return User::withCount('proyectos')
            ->where('role', 'evaluator')
            ->where('name', 'like', "%$name%")
            ->get();
    }
}
