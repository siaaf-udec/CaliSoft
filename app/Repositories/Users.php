<?php

namespace App\Repositories;

use App\User;


class Users {

  public function searchFreeStudents($name){
      return User::whereDoesntHave('proyectos', function($query) {
        $query->where('tipo', '<>', 'invitado');
      })
        ->where('role', 'student')
        ->where('name', 'like', "%$name%")
        ->limit(10)
        ->get();
  }

}
